@props(['label', 'name', 'type', 'value' => null])

<div>
    <label for="{{ $name }}" class="block font-medium text-sm text-gray-700">{{ $label }}</label>
    <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" :value="$value" class="mt-1 p-2 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" {{ $attributes }}>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
