@props([
    'theader',
    'tbody',
])


<table class="table text-grey-darkest">
    <thead class="bg-grey-dark text-white text-normal ">
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
             {{ $theader }}
        </tr>
    </thead>

    <tbody class="text-gray-600 text-sm font-light">
        {{ $tbody }}
    </tbody>

</table>


