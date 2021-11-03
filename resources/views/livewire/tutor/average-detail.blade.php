
<x-table.table id="promedio">
     <x-table.header>
          
          <x-table.th colspan="1" name="Carnet" class="text-center"/>
          <x-table.th colspan="2" name="Nombre" />
          <x-table.th colspan="1" name="Sexo" class="text-center" />

          @foreach($clases as $clase)
          <x-table.th colspan="1" :name="$clase->asignatura" />
          @endforeach
          <x-table.th colspan="1" name="Promedio" />

     </x-table.header>
     <x-table.body>
          @for($i= 0;$i < count($scores); $i++)
          <tr>
             @for($j= 1;$j < count($scores[$i]); $j++)
                <td class="text-center">{{ $scores[$i][$j]}}</td>
             @endfor
          </tr>
          @endfor          
     </x-table.body> 
     <tfoot>
          <tr>
               <td>
                    <button type="button" class="btn btn-info" wire:click="guardarPromedio">Guardar Promedio</button>
               </td>
          </tr>
     </tfoot>             
</x-table.table> 

