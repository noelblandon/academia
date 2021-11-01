<?php

namespace App\Http\Livewire\Tutor;

use Livewire\Component;
use App\Models\Score;
use App\Models\Average;

class AverageDetail extends Component{


    public $grade;
    public $seccion;
    public $courses = [];
    public $students = [];
    public $scores = [];
    public $parcial;
    private $parcial_cuant = array('','ICE_cuant','IICE_cuant','ISemestre_cuant','IIICE_cuant','IVCE_cuant','IISemestre_cuant','notaFinal_cuant');
  

    private function whoCourse($grade,$parcial){
        $parcial = intval($parcial);
        if($parcial <= 3 && $grade == "7 grado" || $grade == "8 grado" || $grade == "9 grado"){
            return "Historia";
        }else if($parcial > 3 && $grade == "7 grado" || $grade == "8 grado" || $grade == "9 grado"){
            return "Geografía";
        }else if($parcial <= 3 && $grade == "10 grado"){
            return "Economía ";
        }else if($parcial > 3 && $grade == "10 grado"){
            return "Geografía";
        }else if($parcial <= 3 && $grade == "11 grado"){
            return "Filosofía";
        }else if($parcial > 3 && $grade == "11 grado"){
            return "Sociología";
        }else{
            return "";
        }
    }

  

    private function getScores($course){
        return Score::select('asignatura')
                    ->where('grado',$this->grade)
                    ->where('seccion',$this->seccion)
                    ->where('anioLectivo',date('Y'))
                    ->where('asignatura','!=','Conducta')
                    ->where('asignatura','!=',$course) 
                    ->distinct('asignatura')
                    ->orderBy('asignatura','asc')
                    ->get();
    }

    private function getStudent(){
        return Score::select('carnet','nombres','apellidos','sexo' )
                    ->where('grado',$this->grade)
                    ->where('seccion',$this->seccion)
                    ->where('anioLectivo',date('Y'))
                    ->distinct('carnet')
                    ->orderBy('apellidos','asc')
                    ->orderBy('nombres','asc')
                    ->get();
    }

    private function getScoresAverage($students,$courses){
        $scores = [];                             
        for($st=0;$st<count($students);$st++){
            $student_data = array($students[$st]->carnet, $students[$st]->nombres,$students[$st]->apellidos, $students[$st]->sexo);
             $promedio = 0;
            for($sc=0;$sc<count($courses);$sc++){
                 $score = Score::select(''.$this->parcial_cuant[intval($this->parcial)].' as nota' )
                                    ->where('grado',$this->grade)
                                    ->where('seccion',$this->seccion)
                                    ->where('anioLectivo',date('Y'))
                                    ->where('asignatura',$this->courses[$sc]->asignatura)
                                    ->where('carnet',$this->students[$st]->carnet)                                    
                                    ->first();
                $student_data =  array_merge($student_data,array($score->nota)); 
                $promedio = $promedio + intval($score->nota);
               
            }   
            $promedio = $promedio / (count($courses));
            $promedio = number_format($promedio,2,'.',',');
            $student_data =  array_merge($student_data,array($promedio)); 
            $scores[$st] = $student_data;           
        }      

        return $scores;
    }

    public function mount($grade,$seccion,$parcial){
        $this->grade = $grade;
        $this->seccion = $seccion;
        $this->parcial = $parcial;    
    }

    public function render(){
       
        $course = $this->whoCourse($this->grade,$this->parcial);
      
        $this->courses = $this->getScores($course);

        $this->students = $this->getStudent();
                  
        $this->scores = $this->getScoresAverage($this->students,$this->courses);


        return view('livewire.tutor.average-detail',['clases' => $this->courses ]);
    }
}
