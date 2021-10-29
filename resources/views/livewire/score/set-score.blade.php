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
                    <x-table.th colspan="2" name="I Parcial" class="text-center" />
                    <x-table.th colspan="2" name="II Parcial" class="text-center" />    
                    <x-table.th colspan="2" name="I Semestre" class="text-center" />
                    <x-table.th colspan="2" name="III Parcial" class="text-center" />       
                    <x-table.th colspan="2" name="IV Parcial" class="text-center" />
                    <x-table.th colspan="2" name="II Semestre" class="text-center" />  
                    <x-table.th colspan="2" name="Nota Final" class="text-center" /> 
                    <x-table.th colspan="1" name="Esp" class="text-center" />  
                    <x-table.th colspan="1" name="  " class="text-center" />  

               </x-table.header>
               <x-table.body>
                    @forelse($scores as $score)
                        <livewire:score.set-score-detail :score="$score" :wire:key="'tr-'.$score->idnotas" />
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

@push('css')
    <style>
        .table-select{
            appearance: none !important;
            width: 35px !important;
            padding-right: 0px !important;
            padding-left: 5px !important;
            background:transparent;
        }
    </style>
@endpush   