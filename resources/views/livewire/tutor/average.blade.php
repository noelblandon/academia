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
<div>
<x-card.card>
    <x-card.header :title="$title " 
                    description=" " title-class="text-capitalize">

    </x-card.header>               
    <x-card.body>
    <x-table.table id="promedio">
     <x-table.header>
          
          <x-table.th colspan="1" name="Carnet" class="text-center"/>
          <x-table.th colspan="2" name="Nombre" />
          <x-table.th colspan="1" name="Sexo" class="text-center" />

          @foreach($clases as $course)
          <x-table.th colspan="1" :name="$course->asignatura" />
          @endforeach
          <x-table.th colspan="1" name="Promedio" />

     </x-table.header>
     <x-table.body>
        @foreach($estudiantes as $index =>  $student)
          <livewire:tutor.average-detail :student="$student" :courses="$courses" :index="$index" :parcial="$parcial" :wire:key="'promedio-parciales-'.$index" />
        @endforeach
     
     </x-table.body> 
            
</x-table.table> 
    
    </x-card.body>  
</x-card.card>
</div>
@endsection


