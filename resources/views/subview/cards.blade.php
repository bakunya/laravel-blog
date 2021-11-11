<div class="mx-auto row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4">
    @foreach ($articles as $article)
        <div class="col p-2">
            <div class="card p-0 border-0 shadow rounded-3">
                {{-- <img src="{{ $article->image_url }}" class="img-fluid img-card-article" alt="{{ $article->title }}"> --}}
                <div class="card-body">
                    <h5 class="card-title text-capitalize">{{ substr($article->title, 0, 20) }}...</h5>
                    <a href="/articles/categories/{{ $article->category->slug }}" class="card-subtitle mb-2 d-block text-decoration-none text-primary text-lowercase">{{ $article->category->name }}</a>
                    <p class="card-text">{{ substr($article->content, 0, 50) }}...</p>
                    <a href="/article/{{ $article->slug }}" class="btn btn-primary d-block ms-auto w-fit-content">Read more</a>

                    @isset($actions)
                        <button class="btn btn-outline-dark bg-light text-dark container mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $article->id }}" aria-expanded="false" aria-controls="collapse-{{ $article->id }}">Action</button>
                        <div class="collapse" id="collapse-{{ $article->id }}">
                            <div class="card card-body d-flex flex-wrap mt-3 flex-column justify-content-end">
                                @foreach ($actions as $action)
                                    <div class="mx-1 my-1">
                                        @switch($action['method'])
                                            @case('get')
                                                <a href="{{ $action['action'] }}/{{ $article[$action['param']] }}" class="btn btn-{{ $action['type'] }} d-block ms-auto container">{{ $action['title'] }}</a>
                                                @break
                                            @case('delete')
                                                <button 
                                                    type="button" 
                                                    class="btn btn-danger toast-trigger container" 
                                                    data-toast="toast-content-action"
                                                    data-title="{{ $action['title'] }}" 
                                                    data-message="Are you sure to delete <strong>{{ $article->title }}?</strong> You should use 'Unpublish' action instead delete."
                                                    data-id="{{ $article->id }} "
                                                    data-action="{{ $action['action'] }} "
                                                    data-type="danger"
                                                    data-method="delete"
                                                >
                                                    {{ $action['title'] }}
                                                </button>
                                                @break
                                            @default
                                                <x-utils.action action="{{ $action['action'] }}" id="{{ $article->id }}" name="{{ $action['title'] }}" method="{{ $action['method'] }}" type="{{ $action['type'] }}" />
                                        @endswitch
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endisset
                    
                </div>
            </div>
        </div>
    @endforeach
</div>