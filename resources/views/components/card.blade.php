<!-- Card Sextion Starts Here -->
<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

<!-- card -->

<div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
    <div class="px-6 py-2 border-b border-light-grey">
        <div class="font-bold text-xl">{{ $title }}</div>
    </div>

    {{ $slot }}

</div>
<!-- /card -->

</div>
<!-- /Cards Section Ends Here -->

