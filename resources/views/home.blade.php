@extends('layouts.main')

@section('title', ucfirst($user_information["username"]))

@section('content')
    <x-flash.flash-alert />

    <div class="container">
        @if(count($unpublished_articles) > 0)
            <h2 class="mt-5 mb-4">Unpublished Articles</h2>
            @include("subview.cards", [
                "articles" => $unpublished_articles,
                "actions" => [
                    [
                        "action" => "/article/action/edit",
                        "param" => "id",
                        "title" => "Edit article",
                        "method" => "get",
                        "type" => "primary"
                    ],
                    [
                        "action" => "/article/publish",
                        "title" => "Publish article",
                        "method" => "put",
                        "type" => "info"
                    ],
                    [
                        "action" => "/article",
                        "title" => "Delete article",
                        "method" => "delete",
                        "type" => "danger"
                    ]
                ]
            ])
            <hr class="my-5">
        @endif

        @if(count($published_articles) > 0)
            <h2 class="mt-5 mb-4">Published Articles</h2>
            @include("subview.cards", [
                "articles" => $published_articles,
                "actions" => [
                    [
                        "action" => "/article/action/edit",
                        "param" => "id",
                        "title" => "Edit article",
                        "method" => "get",
                        "type" => "primary"
                    ],
                    [
                        "action" => "/article/unpublish",
                        "title" => "Unpublish article",
                        "method" => "put",
                        "type" => "info"
                    ],
                    [
                        "action" => "/article",
                        "title" => "Delete article",
                        "method" => "delete",
                        "type" => "danger"
                    ]
                ]
            ])
            <hr class="my-5">
        @endif
    </div>

    <x-utils.toast-content-action />
@endsection

@section("script")
    <script src="/script/action-toast.js"></script>
@endsection