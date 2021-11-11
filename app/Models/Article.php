<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {
    use HasFactory;

    protected $guarded = [
        "id"
    ];

    public function scopeFilter($query, $filters) {
        $query
            ->when($filters['categories'] ?? false, function($query, $categories) {
                return $query
                    ->whereHas('category', function ($query) use($categories) {
                        return $query->where('slug', $categories);
                    });
            })
            ->when($filters['author'] ?? false, function($query, $author) {
                return $query
                    ->whereHas('author', function ($query) use($author) {
                        return $query->where('username', $author);
                    });
            })            
            ->when($filters['keywords'] ?? false, function($query, $keywords) {
                return $query
                    ->where('title', 'like', '%' . $keywords . '%')
                    ->orWhere('content', 'like', '%' . $keywords . '%');
            })
            ->where('articles.published', '=', true);
    }

    public function category() {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
