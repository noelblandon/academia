<x-table.table>
     <x-table.header>
          <x-table.th colspan="1" name="Carnet" />
          <x-table.th colspan="1" name="Nombre" />

          @forelse($courses as $course)
               <x-table.th colspan="1" :name="$course->asignatura" class="text-center" /> 
          @empty
               <x-table.th colspan="1" name="No eres tutor" class="text-center" />
          @endforelse


     </x-table.header>
     <x-table.body>

          
     </x-table.body>               
</x-table.table> 