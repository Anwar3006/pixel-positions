@props(['employer', 'width' => 90])

<img src="{{ asset($employer->name) }}" alt="logo" class="rounded-xl" width="{{ $width }}"/>