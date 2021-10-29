<?php

namespace App\Http\Livewire\Tutor;

use Livewire\Component;
use App\Models\Score;
use App\Models\Average;

class AverageDetail extends Component{


    public $grade;
    public $seccion;
    public $parcial;
    public $courses;
    public $students;
    public $scores;
    public $average;
    private $parcial_cuant = array('','ICE_cuant','IICE_cuant','IIICE_cuant','IVCE_cuant');

    private function whoCourse($grade,$parcial){
        $parcial = intval($parcial);
        if($parcial <= 2 && $grade == "7 grado" || $grade == "8 grado" || $grade == "9 grado"){
            return "Historia";
        }else if($parcial > 2 && $grade == "7 grado" || $grade == "8 grado" || $grade == "9 grado"){
            return "Geografía";
        }else if($parcial <= 2 && $grade == "10 grado"){
            return "Economía ";
        }else if($parcial > 2 && $grade == "10 grado"){
            return "Geografía";
        }else if($parcial <= 2 && $grade == "11 grado"){
            return "Filosofía";
        }else if($parcial > 2 && $grade == "11 grado"){
            return "Sociología";
        }else{
            return "";
        }
    }

    public function mount($grade,$seccion,$parcial){
        $this->grade = $grade;
        $this->seccion = $seccion;
        $this->parcial = $parcial;
        $course = "";
        $course = $this->whoCourse($this->grade,$this->parcial);
      
        $this->courses = Score::select('asignatura')
                             ->where('grado',$this->grade)
                             ->where('seccion',$this->seccion)
                             ->where('anioLectivo',date('Y'))
                             ->where('asignatura','!=','Conducta')
                             ->where('asignatura','!=',$course) 
                             ->distinct('asignatura')
                             ->orderBy('asignatura','asc')
                             ->get();

        $this->students = Score::select('carnet','nombres','apellidos','sexo' )
                                    ->where('grado',$this->grade)
                                    ->where('seccion',$this->seccion)
                                    ->where('anioLectivo',date('Y'))
                                    ->distinct('carnet')
                                    ->orderBy('apellidos','asc')
                                    ->orderBy('nombres','asc')
                                    ->get();
        
                             
        for($st=0;$st<count($this->students);$st++){
            $student_data = array('carnet' => $this->students[$st]->carnet,'nombres' => $this->students[$st]->nombres,'apellidos' => $this->students[$st]->apellidos,'sexo' => $this->students[$st]->sexo);
             $promedio = 0;
            for($sc=0;$sc<count($this->courses);$sc++){
                 $score = Score::select(''.$this->parcial_cuant[intval($this->parcial)].' as nota' )
                                    ->where('grado',$this->grade)
                                    ->where('seccion',$this->seccion)
                                    ->where('anioLectivo',date('Y'))
                                    ->where('asignatura',$this->courses[$sc]->asignatura)
                                    ->where('carnet',$this->students[$st]->carnet)                                    
                                    ->first();
                $student_data =  array_merge($student_data,array($this->courses[$sc]->asignatura => $score->nota)); 
                $promedio = $promedio + intval($score->nota);
               
            }   
            $promedio = $promedio / (count($this->courses));
            $promedio = number_format($promedio,2,'.',',');
            $student_data =  array_merge($student_data,array( $this->parcial_cuant[intval($this->parcial)] => $promedio)); 
            $this->scores[$st] = $student_data;
        }                
                         

    }

    

    public function render()
    {
        return view('livewire.tutor.average-detail');
    }
}
