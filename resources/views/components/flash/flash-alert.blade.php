<div>
    @if(session()->has('status'))
        <x-utils.alert type="{{ session('status')['type'] }}" message="{{ session('status')['message'] }}" />
    @endif
</div>