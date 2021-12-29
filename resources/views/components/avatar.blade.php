@props(['file_path'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $file_path ?? $slot }}
</label>
