<div class="mb-3">
    <label for="{{ $name ?? 'form-text-area' }}" class="form-label">{{ $title ?? 'Form Text Area'}}</label>
    <textarea class="form-control @error('content') is-invalid @enderror" id="{{ $name ?? 'fomr-text-area' }}" rows="10" placeholder="{{ $placeholder ?? 'Form text area' }}" name="{{ $name ?? 'form-text-area' }}">{{ $value ?? 'form-text-area' }}</textarea>
    @error($name ?? 'form-text-area')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>