@section('title','Dashboard')

@section('body')

<x-card>
    <x-slot name="title">
      Asignaturas del Año Lectivo {{ date('Y') }}
    </x-slot>   
        <div class="table-responsive">
            <x-table class="table-auto">
                <x-slot name="theader">
                <x-table-header>
                    Asignatura
                </x-table-header> 
                <x-table-header>
                    Grado
                </x-table-header>   
                <x-table-header>
                    Seccion
                </x-table-header> 
                <x-table-header>
                    Registrar Calificaciones
                </x-table-header> 
                </x-slot>
                <x-slot name="tbody">
                    @forelse($scores as $index => $score)
                    <tr class="border-b border-gray-200 {{ (fmod($index, 2) <= 0 )?'':'bg-gray-50'}} hover:bg-gray-100">
                        <x-table-body>
                            {{ $score->asignatura }}
                        </x-table-body> 
                        <x-table-body>
                            {{ $score->grado }}
                        </x-table-body>
                        <x-table-body>
                            {{ $score->seccion }}
                        </x-table-body>
                        <x-table-body>
                            <button  class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                             onclick="window.location.href = '/score/{{ urlSet($score->grado) }}/{{ $score->seccion }}/{{ $score->asignatura }}'">
                                 Ingresar Calificaiones
                            </button>
                            
                        </x-table-body>
                    </tr>
                        @empty
                        <tr>
                            <x-table-body colspan="4" class="text-lg flex justify aling-center item-center py-2">
                                nada
                            </x-table-body> 
                        </tr>
                    @endforelse
                </x-slot>
            </x-table>
        </div>
</x-card>    
                   
@endsection