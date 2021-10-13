@section('title','Agregar Calificacion')


@section('body')

<x-card>
    <x-slot name="title">
      Asignaturas del Año Lectivo {{ date('Y') }}
    </x-slot>   
        <div class="table-responsive">
            <x-table class="table-auto">
                <x-slot name="theader">
                <x-table-header>
                    Carnet
                </x-table-header> 
                <x-table-header>
                    Nombres
                </x-table-header>   
                <x-table-header class="text-center">
                    Cuantitativa
                </x-table-header> 
                <x-table-header class="text-center">
                    Cuantitativa
                </x-table-header> 
                  
                </x-slot>
                <x-slot name="tbody">
                @forelse($scores as $index => $score)
                    <tr class="border-b border-gray-200 {{ (fmod($index, 2) <= 0 )?'':'bg-gray-50'}} hover:bg-gray-100">
                        <x-table-body>
                            {{ $score->carnet }}  
                        </x-table-body> 
                        <x-table-body>
                            {{ $score->nombres }}  {{ $score->apellidos }}
                        </x-table-body>
                        <x-table-body class="text-center">
                            
                            <select class=" block
                                            w-1/2
                                            mt-1
                                            rounded-md
                                            border-gray-300
                                            shadow-sm
                                            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                                    ">
                            @for ($i = 100; $i > 0; $i--)
                                <option {{ ($score->cuantitativa === $i)?'selected':'' }}>{{ $i }}</option>
                            @endfor
                            </select>
                        </x-table-body>
                        <x-table-body class="text-center">
                            {{ $score->cualitativa }}
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
