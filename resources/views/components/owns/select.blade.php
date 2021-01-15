<select id="{{ $name }}"
    name="{{ $name }}"
    autocomplete="{{ $name }}"
    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-300 focus:border-indigo-300 sm:text-sm"
>
    <option>-</option>
    @foreach($options as $key => $option)
    <option value="{{ $key }}"{{ old($name, $relatedData) == $key ? ' selected' : '' }}>
        {{ $option }}
    </option>
    @endforeach
</select>
