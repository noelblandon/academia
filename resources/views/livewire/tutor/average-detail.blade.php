<tr {{ stripeTable($index) }}>
   <td>{{ $student->carnet}}</td>
   <td>{{ $student->nombres}}</td>
   <td>{{ $student->apellidos}}</td>
   <td>{{ $student->sexo}}</td>
   @foreach($score as $value)
   <td>{{ $value}}</td>
   @endforeach
</tr>
 

