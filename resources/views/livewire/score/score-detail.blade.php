<tr {{ stripeTable($score->index) }}>                        
    <x-table.td :value="$score->carnet" />
    <x-table.td :value="$fullname" />
    <x-table.td style="padding-right: 0px;">        
        <select name="select" class="form-control fill" style="appearance: none;width: 52px;">
            <option value="{{ $score->ICE_cuant }}">{{ $score->ICE_cuant }}</option>
            <option value="Retirado">Retirado</option>
            <option value="PSN">PSN</option>
            <option value="SD">SD</option>
            @for($i=100;0 < $i; $i--)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </x-table.td>
    <x-table.td style="padding-left: 0px;">
        <select name="select" class="form-control fill" style="appearance: none;width: 52px;">
            <option value="{{ $score->ICE_cual }}">{{ $score->ICE_cuant }}</option>
        </select>
    </x-table.td>
    <x-table.td :value="$score->IICE_cuant" />
    <x-table.td :value="$score->IICE_cual" />
    <x-table.td value="{{$score->ISemestre_cuant}} {{$score->ISemestre_cual}}" />
    <x-table.td :value="$score->IIICE_cuant" />
    <x-table.td :value="$score->IIICE_cual" />         
    <x-table.td :value="$score->IVCE_cuant" />
    <x-table.td :value="$score->IVCE_cual" />
    <x-table.td value="{{$score->IISemestre_cuant}} {{$score->IISemestre_cual}}" />
    <x-table.td value="{{$score->notaFinal_cuant}} {{$score->notaFinal_cual}}" />
        
</tr>   