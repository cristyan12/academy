<textarea {{ $attributes->merge(['class' => 'shadow-sm focus:ring-indigo-300 focus:border-indigo-300 mt-1 block w-full sm:text-sm border-gray-300 rounded-md', 'rows' => '3']) }}>{{ $slot ?? '' }}</textarea>
