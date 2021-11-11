@extends("layouts.search")

@section("title", "Search")

@section("content")
    <div class="container mt-5 ">
        <div class="input-group mb-3" id="keywords-group">
            <input type="text" name="keywords" value="{{ request('keywords') }}" class="form-control" placeholder="Search articles" aria-label="Search articles" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
        <div class="btn-group d-block ms-auto w-fit-content mb-4" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group" id="categories-group">
                <select name="categories" class="cursor-pointer form-select form-select-md mb-3" aria-label=".form-select-lg example">
                    <option selected value="">Filter by categories</option>
                    @foreach ($categories as $category)
                        @if ($category->slug == request('categories'))
                            <option value="{{ $category->slug }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="btn-group" id="authors-group">
                <select name="author" class="cursor-pointer form-select form-select-md mb-3" aria-label=".form-select-lg example">
                    <option selected value="">Filter by author</option>
                    @foreach ($authors as $author)
                        @if ($author->username == request('author'))
                            <option value="{{ $author->username }}" selected>{{ $author->username }}</option>
                        @else
                            <option value="{{ $author->username }}">{{ $author->username }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        @if(count($articles) < 1) 
            @include("subview.404")
        @endif

        @include("subview.cards")
    </div>
@endsection

@section('inner-script')
    <script>
        function generateQueryString(url = null,  value = '', key = 'keywords') {
            if(!url) throw TypeError('URL not defined')
            if(!!!value) {
                url.delete(key)
            } else {
                url.set(key, value)
            }
            return url
        }

        function handleKeywords(url = null, path = "/articles/search") {
            if(!url) throw TypeError('URL not defined')
            const button = document.querySelector('#keywords-group button')
            const input = document.querySelector('#keywords-group input')
            let query;

            input.addEventListener('keyup', e => {
                query = generateQueryString(url, e.target.value)
                if(e.key === "Enter") location.href = `${path}/?${query.toString()}`
            })

            button.addEventListener('click', () => {
                query = generateQueryString(url, input.value)
                location.href = `${path}/?${query.toString()}`
            })
        }

        function handleCategories(url = null, path = "/articles/search") {
            if(!url) throw TypeError('URL not defined')
            const select = document.querySelector('#categories-group select')
            let query;

            select.addEventListener('change', (e) => {
                query = generateQueryString(url, e.target.value, 'categories')
                location.href = `${path}/?${query.toString()}`
            })
        }

        function handleAuthors(url = null, path = "/articles/search") {
            if(!url) throw TypeError('URL not defined')
            const select = document.querySelector('#authors-group select')
            let query;

            select.addEventListener('change', (e) => {
                query = generateQueryString(url, e.target.value, 'author')
                location.href = `${path}/?${query.toString()}`
            })
        }

        window.addEventListener('load', () => {
            let url = new URLSearchParams(location.search.slice(1));
            handleKeywords(url)
            handleCategories(url)
            handleAuthors(url)
        })
    </script>
@endsection