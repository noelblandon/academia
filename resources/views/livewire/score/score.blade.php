@section('title','Calificaciones')
@section('page-header')
     <x-layouts.page-header 
          title="Calificaciones" 
          subtitle="Listas de asignatura para el año lectivo {{ env('ANIO_LECTIVO') }}" />
@endsection
@section('page-body')

<x-card.card>
    <x-card.header title="Listas de asignatura para el año lectivo  {{ env('ANIO_LECTIVO') }}" 
                    description=" " title-class="text-capitalize" />
    <x-card.body>
          <x-table.table>
               <x-table.header>
                    <x-table.th colspan="1" name="#" class="text-center"/>
                    <x-table.th colspan="1" name="Grado" />
                    <x-table.th colspan="1" name="Seccion"  />
                    <x-table.th colspan="1" name="Asignatura"  />
                    <x-table.th colspan="1" name="Accion"  />                   
               </x-table.header>
               <x-table.body>
                    @forelse($scores as $index => $score)
                    <livewire:score.score-detail :score="$score" :index="$index" :wire:key="'tr-'.$index"   />
                    @empty
                      <tr>
                           <td colspan="5" class="text-center p-5">
                              No se encontraron regitros
                           </td>
                      </tr>
                    @endforelse
               </x-table.body>               
          </x-table.table>   
     </x-card.body>  
</x-card.card>

@endsection