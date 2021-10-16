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
          <x-table.table>
               <x-table.header>                   
                    <x-table.th colspan="1" name="Carnet" />
                    <x-table.th colspan="1" name="Nombre" />
                    <x-table.th colspan="2" name="  I Parcial" class="text-center" />
                    <x-table.th colspan="2" name="  II Parcial" class="text-center" />    
                    <x-table.th colspan="1" name="I Semestre" class="text-center" />
                    <x-table.th colspan="2" name="III Parcial" class="text-center" />       
                    <x-table.th colspan="2" name="IV Parcial" class="text-center" />
                    <x-table.th colspan="1" name="II Semestre" class="text-center" />  
                    <x-table.th colspan="1" name=" Nota Final" class="text-center" />                   
               </x-table.header>
               <x-table.body>
                    @forelse($scores as $index => $score)
                        @php $score['index'] = $index + 1; @endphp 
                        @livewire('score.score-detail', [ 'score' => $score ], key($score->index))
                    @empty
                      <tr>
                           <td colspan="19" class="text-center p-5">
                              No se encontraron regitros
                           </td>
                      </tr>
                    @endforelse
                    
               </x-table.body>               
          </x-table.table> 
     </x-card.body>  
</x-card.card>



@endsection