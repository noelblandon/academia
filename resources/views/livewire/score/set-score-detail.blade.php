
<tr {{ stripeTable($idnotas) }}>                        
    <x-table.td :value="$carnet" />
    <x-table.td :value="$fullname" />
    <x-table.td style="padding-right: 0px;">        
        <select  class="form-control fill table-select"  wire:click="changeScore($event.target.value,1)" >
            <option selected>{{ $p1n }}</option>
            @if($enabled->hab_ICE == 'Activar' )
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
        <select  class="form-control fill table-select" wire:model="p1l">
            <option selected>{{ $p1l }}</option>
        </select>
    </x-table.td>
    <x-table.td style="padding-right: 0px;">        
        <select  class="form-control fill table-select"  wire:click="changeScore($event.target.value,2)">
            <option selected>{{ $p2n }}</option>    
            @if($enabled->hab_IICE == 'Activar' )
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
        <select  class="form-control fill table-select" wire:model="p2l">
            <option selected>{{ $p2l }}</option>
        </select>
    </x-table.td>
    <x-table.td style="padding-right: 0px;">        
        <select  class="form-control fill table-select" wire:model="s1n">
            <option selected>{{ $s1n }}</option>
        </select>
    </x-table.td>
    <x-table.td style="padding-left: 0px;">
        <select  class="form-control fill table-select" wire:model="s1l">
            <option selected>{{ $s1l }}</option>
        </select>
    </x-table.td>

    <x-table.td style="padding-right: 0px;">        
        <select  class="form-control fill table-select"  wire:click="changeScore($event.target.value,3)" >
            <option selected>{{ $p3n }}</option>
            @if($enabled->hab_IIICE == 'Activar' )
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
        <select  class="form-control fill table-select" wire:model="p3l">
            <option selected>{{ $p3l }}</option>
        </select>
    </x-table.td>
    <x-table.td style="padding-right: 0px;">        
        <select  class="form-control fill table-select" wire:click="changeScore($event.target.value,4)">
        <option selected>{{ $p4n }}</option>
            @if($enabled->hab_IVCE == 'Activar' )
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
        <select  class="form-control fill table-select" wire:model="p4l">
            <option selected>{{ $p4l }}</option>
        </select>
        </x-table.td>
    <x-table.td style="padding-right: 0px;">        
        <select  class="form-control fill table-select" wire:model="s2n">
            <option selected>{{ $s2n}}</option>
        </select>
    </x-table.td>
    <x-table.td style="padding-left: 0px;">
        <select  class="form-control fill table-select" wire:model="s2l">
            <option selected>{{ $s2l }}</option>
        </select>
    </x-table.td>

    <x-table.td style="padding-right: 0px;">        
        <select  class="form-control fill table-select" wire:model="nfn">
            <option selected>{{ $nfn }}</option>
        </select>
    </x-table.td>
    <x-table.td style="padding-left: 0px;">
        <select  class="form-control fill table-select"  wire:model="nfl">
            <option selected>{{ $nfl }}</option>
        </select>
    </x-table.td>
    <x-table.td style="padding-right: 0px;">        
        <select  class="form-control fill table-select" wire:click="especialScore($event.target.value)">
            <option selected>{{ $especial }}</option>
            @if(intval($nfn) < 60)
                @for($i=100;0 < $i; $i--)
                <option>{{ $i }}</option>
                @endfor
            @endif 
        </select>
    </x-table.td>
    <x-table.td style="padding-right: 0px;" /> 
 
</tr>
