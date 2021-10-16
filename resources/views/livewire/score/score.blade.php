@section('title','Calificaciones')
@section('page-header')
     <x-layouts.page-header 
          title="Calificaciones" 
          subtitle="Listas de asignatura para el año lectivo {{ date('Y') }}" />
@endsection
@section('page-body')

<x-card.card>
    <x-card.header title="Listas de asignatura para el año lectivo  {{ date('Y') }}" 
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
                         <tr {{ stripeTable($index) }}>
                              <x-table.td :value="$index + 1 " class="text-center"/>
                              <x-table.td :value="$score->grado " />
                              <x-table.td :value="$score->seccion " />
                              <x-table.td :value="$score->asignatura " />
                              <x-table.td class="pt-2">
                                   <button class="btn waves-effect waves-light btn-danger btn-outline-danger"
                                        onclick="window.location.href= '/score/{{ setUrl($score->grado) }}/{{ setUrl($score->seccion) }}/{{ setUrl($score->asignatura) }}';"  >
                                        <i class=" ti-pencil-alt"></i>Agregar Nota
                                   </button>
                              </x-table.td>
                         </tr>     
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