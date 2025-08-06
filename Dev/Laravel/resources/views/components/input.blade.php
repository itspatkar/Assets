<div class="mb-3">
    <div class="input-group">
        <label class="input-group-text" for="{{ $name }}"><b>{{ Str::ucfirst($name) }}</b> </label>
        <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}"
            name="{{ $name }}" value="{{ old($name) }}" autofocus required>
    </div>
    <span class="text-danger">
        @error($name)
            {{ $message }}
        @enderror
    </span>
</div>
