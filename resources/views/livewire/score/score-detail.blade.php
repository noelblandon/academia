
<tr {{ stripeTable($score->idnotas) }}>                        
    <x-table.td :value="$score->carnet" />
    <x-table.td :value="$fullname" />
    <x-table.td style="padding-right: 0px;">        
        <select  class="form-control fill table-select" data-parcial="1" data-id="{{ $score->idnotas }}" >
            <option>{{ $score->ICE_cuant }}</option>
            @if($p1 == 'Activar' )
                <option>Retirado</option>
                <option>PSN</option>
                <option>SD</option>
                @for($i=100;0 < $i; $i--)
                <option>{{ $i }}</option>
                @endfor
            @endif    

        </select>
    </x-table.td>
    <x-table.td style="padding-left: 0px;">
        <select  class="form-control fill table-select" id="p1-{{ $score->idnotas }}">
            <option>{{ $score->ICE_cual }}</option>
        </select>
    </x-table.td>
    <x-table.td style="padding-right: 0px;">        
        <select  class="form-control fill table-select" data-parcial="2" data-id="{{ $score->idnotas }}" >
            <option>{{ $score->IICE_cuant }}</option>    
            @if($p2 == 'Activar' )
                <option>Retirado</option>
                <option>PSN</option>
                <option>SD</option>
                @for($i=100;0 < $i; $i--)
                <option>{{ $i }}</option>
                @endfor
            @endif    
     
        </select>
    </x-table.td>
    <x-table.td style="padding-left: 0px;">
        <select  class="form-control fill table-select" id="p2-{{ $score->idnotas }}">
            <option>{{ $score->IICE_cual }}</option>
        </select>
    </x-table.td>
    <x-table.td style="padding-right: 0px;">        
        <select  class="form-control fill table-select" id="s1n-{{ $score->idnotas }}">
            <option>{{ $score->ISemestre_cuant }}</option>
        </select>
    </x-table.td>
    <x-table.td style="padding-left: 0px;">
        <select  class="form-control fill table-select" id="s1l-{{ $score->idnotas }}">
            <option>{{ $score->ISemestre_cual }}</option>
        </select>
    </x-table.td>

    <x-table.td style="padding-right: 0px;">        
        <select  class="form-control fill table-select" data-parcial="3" data-id="{{ $score->idnotas }}" >
            <option>{{ $score->IIICE_cuant }}</option>
            @if($p3 == 'Activar' )
                <option>Retirado</option>
                <option>PSN</option>
                <option>SD</option>
                @for($i=100;0 < $i; $i--)
                <option>{{ $i }}</option>
                @endfor
            @endif 
        </select>
    </x-table.td>
    <x-table.td style="padding-left: 0px;">
        <select  class="form-control fill table-select" id="p3-{{ $score->idnotas }}">
            <option>{{ $score->IIICE_cual }}</option>
        </select>
    </x-table.td>
    <x-table.td style="padding-right: 0px;">        
        <select  class="form-control fill table-select" data-parcial="4" data-id="{{ $score->idnotas }}" >
        <option>{{ $score->IVCE_cuant }}</option>
            @if($p4 == 'Activar' )
                <option>Retirado</option>
                <option>PSN</option>
                <option>SD</option>
                @for($i=100;0 < $i; $i--)
                <option>{{ $i }}</option>
                @endfor
            @endif 
        </select>
    </x-table.td>
    <x-table.td style="padding-left: 0px;">
        <select  class="form-control fill table-select" id="p4-{{ $score->idnotas }}">
            <option>{{ $score->IVCE_cual }}</option>
        </select>
        </x-table.td>
    <x-table.td style="padding-right: 0px;">        
        <select  class="form-control fill table-select" id="s2n-{{ $score->idnotas }}">
            <option>{{ $score->IISemestre_cuant }}</option>
        </select>
    </x-table.td>
    <x-table.td style="padding-left: 0px;">
        <select  class="form-control fill table-select" id="s2l-{{ $score->idnotas }}">
            <option>{{ $score->IISemestre_cual }}</option>
        </select>
    </x-table.td>

    <x-table.td style="padding-right: 0px;">        
        <select  class="form-control fill table-select" id="nfn-{{ $score->idnotas }}">
            <option>{{ $score->notaFinal_cuant }}</option>
        </select>
    </x-table.td>
    <x-table.td style="padding-left: 0px;">
        <select  class="form-control fill table-select"  id="nfl-{{ $score->idnotas }}">
            <option>{{ $score->notaFinal_cual }}</option>
        </select>
    </x-table.td>
 
</tr>
