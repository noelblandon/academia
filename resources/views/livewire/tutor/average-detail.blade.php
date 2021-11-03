<div>
<div class="p-3 mx-auto">
     <button type="button" class="btn btn-info" wire:click="guardarPromedio">Guardar Promedio</button>

     <div wire:loading wire:targer="guardarPromedio" style="position:absolute;">
               <x-loading />     
     </div>
<div class="dropdown open" style="float: right;">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background:white;">
     <span class="glyphicon glyphicon-th-list"></span> Exportar 
   
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li>
        <!--a href="#" onclick="$('#promedio').tableExport({type:'json',escape:'false'});"> <img src="images/json.jpg" width="24px"> JSON</a></li-->
        <!--li><a href="#" onclick="$('#promedio').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src="images/json.jpg" width="24px">JSON (ignoreColumn)</a></li-->
        <!--li><a href="#" onclick="$('#promedio').tableExport({type:'json',escape:'true'});"> <img src="images/json.jpg" width="24px"> JSON (with Escape)</a></li-->
        <!--li class="divider"></li-->
        <!--li><a href="#" onclick="$('#promedio').tableExport({type:'xml',escape:'false'});"> <img src="images/xml.png" width="24px"> XML</a></li-->
        <!--li><a href="#" onclick="$('#promedio').tableExport({type:'sql'});"> <img src="images/sql.png" width="24px"> SQL</a></li-->
        <!--li class="divider"></li-->
        <!--li><a href="#" onclick="$('#promedio').tableExport({type:'csv',escape:'false'});">&nbsp;CSV</a></li>
        <li><a href="#" onclick="$('#promedio').tableExport({type:'txt',escape:'false'});">&nbsp;TXT</a></li-->
        <li class="divider"></li>				
        
        <li><a href="#" onclick="$('#promedio').tableExport({type:'excel',escape:'false'});">&nbsp;Excel</a></li>
        <li><a href="#" onclick="$('#promedio').tableExport({type:'doc',escape:'false'});">&nbsp;Word</a></li>
        <li><a href="#" onclick="$('#promedio').tableExport({type:'powerpoint',escape:'false'});">&nbsp;PowerPoint</a></li>
        <li class="divider"></li>
        <!--li><a href="#" onclick="$('#promedio').tableExport({type:'png',escape:'false'});"> <img src="images/png.png" width="24px"> PNG</a></li-->
        <li><a href="#" onclick="generate();">&nbsp;PDF</a></li>
        
  </ul>
</div>
</div>



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
          <tr {{ stripeTable($i) }}>
             @for($j= 1;$j < count($scores[$i]); $j++)
                <td class="text-center">{{ $scores[$i][$j]}}</td>
             @endfor
          </tr>
          @endfor          
     </x-table.body> 
            
</x-table.table> 
</div>
@push('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  
window.addEventListener('swal:modal', event => { 
    swal({
      title: event.detail.message,
      text: event.detail.text,
      icon: event.detail.type,
    });
});
</script> 
@endpush



