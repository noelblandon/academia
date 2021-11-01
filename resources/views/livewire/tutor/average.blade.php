@section('title', $title )
@section('page-header')
     <x-layouts.page-header 
          title="Calificaciones" 
          :subtitle="$title">
                    <li class="breadcrumb-item">
                        <a href="#" class="text-capitalize">{{ $title }}</a>
                    </li>
     </x-layouts.page-header>
@endsection
@section('page-body')
<x-card.card>
    <x-card.header :title="$title " 
                    description=" " title-class="text-capitalize" />
    <x-card.body>
    <livewire:tutor.average-detail :grade="$grade" :seccion="$seccion" :parcial="$parcial" :wire:key="'promedio-parciales'" />

    </x-card.body>  
</x-card.card>

@endsection
