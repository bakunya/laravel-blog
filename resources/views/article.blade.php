@extends("layouts.main")

@section("title", "Articles")

@section("content")
    <div class="container mx-auto my-5">
        <figure class="text-center">
            <blockquote class="blockquote mb-4">
              <h1 class="text-muted text-capitalize">{{ $article->title }}</h1>
            </blockquote>
            <figcaption class="blockquote-footer">
                <a class="text-capitalize h6 text-decoration-none text-muted" href="/articles/author/{{ $author->username }}">{{ $author->username }}</a>
            </figcaption>
        </figure>
        <div class="d-flex flex-column align-items-start mt-5">
            <span class="text-muted mb-3">Created: {{ date("F j, Y, g:i a", strtotime($article->created_at)) }}</span>
            <span class="text-muted mb-3">Updated: {{ date("F j, Y, g:i a", strtotime($article->updated_at)) }}</span>
        </div>
        <p class="text-muted mb-3">Category: <a href="/articles/categories/{{ $category->slug }}" class="text-decoration-none text-capitalize">{{ $category->name }}</a></p>
        <p class="text-muted">Author: <a href="/articles/author/{{ $author->username }}" class="text-decoration-none text-capitalize">{{ $author->username }}</a></p>
        <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="mx-auto d-block my-5 image-article">
        <p class="white-space-pre-line">{{ $article->content }}</p>
    </div>
@endsection