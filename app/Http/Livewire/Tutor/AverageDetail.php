<?php

namespace App\Http\Livewire\Tutor;

use Livewire\Component;
use App\Models\Score;
use App\Models\Average;

class AverageDetail extends Component{


    public $index;
    public $courses;
    public $student;
    public $score;
    public $avg;
    public $student_data = [];
    public $parcial;
    private $index1;
    private $index2;
    private $parcial_cuant = array('','ICE_cuant','IICE_cuant','ISemestre_cuant','IIICE_cuant','IVCE_cuant','IISemestre_cuant','notaFinal_cuant');
    private $promedio_cuant = array('','prom_ICE','prom_IICE','prom_ISemestre','prom_IIICE','prom_IVCE','prom_IISemestre','prom_notaFinal');
    private $nota_final_array = array("Historia","Geografía","Economía","Filosofía","Sociología");
    
    
    
    
  /*  public function guardarPromedio(){
      
        for($i=0;$i < count($this->scores);$i++){
            $lugar = count($this->scores[$i]) - 1;
            Average::where('id_promedio',$this->scores[$i][0])
            ->update([$this->promedio_cuant[intval($this->parcial)] => $this->scores[0][$lugar]]);
        }

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Promedio', 
            'text' => 'Promedio Guardado'
        ]);
    }


*/
   

    private function getAverages($students){
      
        for($i=0;$i < count($students);$i++){
            $data =  Average::select('id_promedio' )
                        ->where('carnet',$students[$i]->carnet)
                        ->where('anioLectivo',date('Y'))
                        ->orderBy('apellidos','asc')
                        ->orderBy('nombres','asc')
                        ->first();
            $average[$i] = $data->id_promedio;        
        }                
        return $average;            
    }


    private function notaFinal($courses){
        $promedio = 0;
        $csb = false;
        $cs = 0;

            foreach($courses as $course){
                $score = getScoreByCourse($this->parcial,$course->asignatura,$this->student);
                if(in_array(trim($course->asignatura),$this->nota_final_array)){  
                    if($csb){
                        $cs = (intval($cs) + intval($score->nota))/2;
                        $this->arrayPush(trim($cs)); 
                        $promedio = $promedio + intval($cs);
                        $csb = false;
                    }else{
                        $cs = $score->nota;
                        $csb = true;
                    }
                }else{
                    $this->arrayPush(trim($score->nota)); 
                    $promedio = $promedio + intval($score->nota);
                }
                
            }
        return $promedio;
    }

    private function notaParcial(){
        $promedio = 0;
        $this->score = [];
          foreach ($this->courses as $index => $course) {
            $score = getScoreByCourse($this->parcial,$course->asignatura,$this->student);
            $this->score[$index] = trim($score->nota); 
            $promedio = $promedio + intval($score->nota);
          }
        return $promedio;    
    }


  

    private function getScoresAverage(){    
     
            $promedio = 0;
            if(intval($this->parcial) == 7){               
                $promedio = $this->notaFinal($this->courses);
                $promedio = $promedio / (count($this->courses)-1);
            }else{
                $promedio = $this->notaParcial($this->courses);
                $promedio = $promedio / (count($this->courses));
            }
            
            $promedio = number_format($promedio,2,'.',',');
            $this->score[count($this->score)] = trim($promedio); 
            Average::where('carnet',$this->student->carnet)
            ->where('anioLectivo',date('Y'))
            ->update([$this->promedio_cuant[intval($this->parcial)] => $promedio]);
    
     }

    public function mount($student,$courses,$index,$parcial){
        $this->student  = $student;  
        $this->courses  = $courses;  
        $this->index    = $index;  
        $this->parcial  = $parcial;
      
    }

    public function render(){
       $this->getScoresAverage();

        
       /* $this->averages = $this->getAverages($students_data);
                  
        $this->scores = $this->getScoresAverage($students_data,$courses_data);
        
        
        if(intval($this->parcial == 7)){
           
          $name='Ciencias Sociales ('.$courses_data[$this->index1]->asignatura.'/'.$courses_data[$this->index2]->asignatura.')';
          $courses_data[$this->index2]->asignatura = $name ;
          unset($courses_data[$this->index1]);    
            
        }*/

        return view('livewire.tutor.average-detail');
    }
}

/*
<div>
<div class="p-3 mx-auto">
     <button type="button" class="btn btn-info" wire:click="guardarPromedio">Guardar Promedio</button>

     <div wire:loading wire:targer="guardarPromedio" style="position:absolute;">
               <x-loading />     
     </div>
     <button type="button" class="btn btn-success" >Exportar a Excell</button>

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


*/
