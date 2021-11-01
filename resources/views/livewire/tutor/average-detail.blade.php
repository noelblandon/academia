
<x-table.table>
     <x-table.header>
          <x-table.th colspan="1" name="Carnet" />
          <x-table.th colspan="2" name="Nombre" />
          <x-table.th colspan="1" name="Sexo" />

          @foreach($clases as $clase)
          <x-table.th colspan="1" :name="$clase->asignatura" />
          @endforeach
          <x-table.th colspan="2" name="Promedio" />

     </x-table.header>
     <x-table.body>
          @for($i= 0;$i < count($scores); $i++)
             <tr>
             @for($j= 0;$j < count($scores[$i]); $j++)
                <td>{{ $scores[$i][$j]}}</td>
             @endfor
               </tr>
          @endfor          
     </x-table.body>               
</x-table.table> 
