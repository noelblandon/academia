
<tr {{ stripeTable($index) }}>   
    <x-table.td :value="$index + 1 " class="text-center"/>
    <x-table.td :value="$score->grado " />
    <x-table.td :value="$score->seccion " />
    <x-table.td :value="$score->asignatura " />
    <x-table.td class="pt-2">
        <button class="btn waves-effect waves-light btn-inverse" onclick="$('#loader-redirect').show();window.location.href= '/score/{{ setUrl($score->grado) }}/{{ setUrl($score->seccion) }}/{{ setUrl($score->asignatura) }}';" >
            <i class=" ti-pencil-alt"></i>Agregar Nota
        </button>
    </x-table.td>
</tr>   