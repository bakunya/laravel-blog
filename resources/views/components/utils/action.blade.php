<form method="post" action="{{ $action }}" class="m-0 p-0">
    @csrf
    @method($method ?? 'put')
    <input type="hidden" name="id" value="{{ $id }}">
    <button type="submit" class="btn btn-{{ $type }} container">{{ $name }}</button>
</form>