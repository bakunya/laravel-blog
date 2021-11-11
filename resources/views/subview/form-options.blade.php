@isset($options)
    <div class="mb-3">
        <select class="form-select @error($name ?? 'form-options') is-invalid @enderror" aria-label="Default select example" name={{ $name ?? 'form-options' }}>
            <option value="">{{ $title ?? 'Open this select this options' }}</option>
            @foreach ($options as $option)
                <option value="{{ $option->id }}" @if($selected == $option->id) selected @endif >{{ $option->name }}</option>
            @endforeach
        </select>
        @error($name ?? 'form-options')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
@endisset