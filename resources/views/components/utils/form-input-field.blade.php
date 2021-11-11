<div class="mb-3">
    @if($type !== "hidden")
        <label for="{{ $name ?? 'form-input-field' }}" class="form-label">{{ $title ?? 'Form Input Field' }}</label>
    @endif
    <input 
        type="{{ $type ?? 'text' }}" 
        class="form-control @error($name ?? 'form-input-field') is-invalid @enderror" 
        id="{{ $name ?? 'form-input-field' }}" 
        placeholder="{{ $placeholder ?? 'Form input field' }}" 
        name="{{ $name ?? 'form-input-field' }}" 
        value="{{ $value ?? 'form-input-field' }}" 
        @if($required ?? false) required @endif
    >
    @error($name ?? 'form-input-field')
        <div class="invalid-feedback">{{ $message ?? 'error' }}</div>
    @enderror
</div>