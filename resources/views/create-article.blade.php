@extends("layouts.main")

@section("title", "Create Article")

@section("content")
    <div class="container mt-5 mb-5">
        <x-flash.flash-alert />
        <h2 class="mb-5 text-muted">Create Article</h2>
        <form action="/article" method="POST">
            @csrf
            <x-utils.form-input-field name="title" title="Title" type="text" placeholder="Programming with javascript" required={{ true }} value="{{ old('title') }}" />
            <x-utils.form-input-field name="slug" title="Slug URL" type="text" placeholder="programming-with-javascript" required={{ true }} value="{{ old('slug') }}" />
            <x-utils.form-input-field name="image_url" title="Image" type="text" placeholder="https://example.com/your-image.jpg" value="{{ old('image_url') }}" />
            <x-utils.form-text-area name="content" title="Content" placeholder="In here we'll talk about ..." value="{{ old('content') }}" />
            @include('subview.form-options', [
                'title' => 'Open this select this category',
                'name' => 'category_id',
                'options' => $categories,
                'selected' => old('category_id')
            ])
            <button type="submit" class="btn btn-primary ms-auto d-block px-5 py-2 mt-4 d-block">Post Article</button>
        </form>
    </div>
@endsection