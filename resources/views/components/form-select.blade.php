@props(['label', 'name', 'value' => null, 'options' => []])

<div>
    <label for="{{ $name }}" class="block font-medium text-sm text-gray-700">{{ $label }}</label>
    <select id="{{ $name }}" name="{{ $name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" {{ $attributes }}>
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ $optionValue == $value ? 'selected' : '' }}>{{ $optionLabel }}</option>
        @endforeach
    </select>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
