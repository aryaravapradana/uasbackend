@props(['disabled' => false])

<input {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}
    style="background-color: white !important; border: 2px solid black !important; color: black !important;">