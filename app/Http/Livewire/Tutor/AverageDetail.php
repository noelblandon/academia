<?php

namespace App\Http\Livewire\Tutor;

use Livewire\Component;
use App\Models\Score;
use App\Models\Average;

class AverageDetail extends Component{


    public $courses;
    public $index;
    public $score;
    public $avg;
    public $student;
    public $student_data = [];
    public $parcial;
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
   
    private function notaFinal(){
        $promedio = 0;
        $csb = false;
        $cs = 0;

            foreach($this->courses as $index =>  $course){
                $scor = getScoreByCourse($this->parcial,$this->student,$course->asignatura);
                
                if(in_array(trim($course->asignatura),$this->nota_final_array)){  
                    if($csb){
                        $cs = (intval($cs) + intval($scor->nota))/2;
                        $this->score[$index] = trim($cs); 
                        $promedio = $promedio + intval($cs);
                        $csb = false;
                    }else{
                        $cs = $scor->nota;
                        $csb = true;
                    }
                }else{
                    if(!isset($scor->nota)){
                        dd($course);
                    }
                   $this->score[$index] = (isset($scor->nota))?trim($scor->nota):''; 
                    $promedio = $promedio + ((isset($scor->nota))?intval($scor->nota):0);
                }
                
            }
        return $promedio;
    }

    private function notaParcial(){
        $promedio = 0;
        $this->score = [];
          foreach ($this->courses as $index => $course) {             
            $score = getScoreByCourse($this->parcial,$this->student,$course->asignatura);
            $this->score[$index] = trim($score->nota); 
            $promedio = $promedio + intval($score->nota);
          }
        return $promedio;    
    }


  

    private function getScoresAverage($student){    
     
            $promedio = 0;
            if(intval($this->parcial) == 7){               
                $promedio = $this->notaFinal();
                $promedio = $promedio / (count($this->courses)-1);
            }else{
                $promedio = $this->notaParcial();
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
        //dd($this->courses);
        $this->getScoresAverage($student);
      
    }

    public function render(){
       
        return view('livewire.tutor.average-detail');
    }
}
/*
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
