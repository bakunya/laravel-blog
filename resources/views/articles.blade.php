@extends("layouts.main")

@section("title", "Articles")

@section("content")
    <div class="container mt-5 ">
        @include("subview.cards")
    </div>
@endsection