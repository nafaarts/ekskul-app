@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'alert alert-warning']) }} role="alert">
        {{ $status }}
    </div>
@endif
