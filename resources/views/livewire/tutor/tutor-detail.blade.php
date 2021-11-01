
<tr {{ stripeTable($index) }}>
    <x-table.td :value="$index + 1 " class="text-center"/>
    <x-table.td :value="$grado " />
    <x-table.td :value="$seccion " />
    <x-table.td :value="$score->asignatura " />
    <x-table.td class="pt-2">
  
        <button class="btn waves-effect waves-light btn-inverse"
            onclick="window.location.href= '/score/{{ setUrl($grado) }}/{{ setUrl($seccion) }}/{{ setUrl($score->asignatura) }}';"  >
            <i class=" ti-pencil-alt"></i>Agregar Nota
        </button>
        <!--div class="dropdown-success dropdown open"-->
            <button class="btn btn-success dropdown-toggle waves-effect waves-light " type="button" id="dropdown-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class=" ti-pencil-alt"></i>Promedio</button>
            <div class="dropdown-menu" aria-labelledby="dropdown-3" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                <a href="javascript:void(0)" class="dropdown-item waves-light waves-effect" wire:click="testRedirect(1)" >Primer Parcial</a>
                <a href="javascript:void(0)" class="dropdown-item waves-light waves-effect" wire:click="testRedirect(2)">Segundo Parcial</a>
                <a href="javascript:void(0)" class="dropdown-item waves-light waves-effect" wire:click="testRedirect(3)">Primer Semestre</a>
                <a href="javascript:void(0)" class="dropdown-item waves-light waves-effect" wire:click="testRedirect(4)">Tercer Parcial</a>
                <a href="javascript:void(0)" class="dropdown-item waves-light waves-effect" wire:click="testRedirect(5)">Cuarto Parcial</a>
                <a href="javascript:void(0)" class="dropdown-item waves-light waves-effect" wire:click="testRedirect(6)">Segundo Semestre</a>
                <a href="javascript:void(0)" class="dropdown-item waves-light waves-effect" wire:click="testRedirect(7)">Nota Final</a>
            </div>
        <!--/div-->
    
    </x-table.td>
</tr> 