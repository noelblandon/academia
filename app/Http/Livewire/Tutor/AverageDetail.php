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
    public $student_data = [];
    public $parcial;
    private $index1;
    private $index2;
    private $parcial_cuant = array('','ICE_cuant','IICE_cuant','ISemestre_cuant','IIICE_cuant','IVCE_cuant','IISemestre_cuant','notaFinal_cuant');
    private $nota_final = array("Historia","Geografía","Economía","Filosofía","Sociología");
    public function guardarPromedio(){
        dd($this->scores);
    }



    private function whoCourse($grade,$parcial){
        $parcial = intval($parcial);
        if($parcial === 7){
            return "";
        }else if($parcial <= 3 && $grade == "7 grado" || $grade == "8 grado" || $grade == "9 grado"){
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

  

    private function getCourses($course){
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

    private function getScore($course,$student){
        return Score::select(''.$this->parcial_cuant[intval($this->parcial)].' as nota' )
                                    ->where('grado',$this->grade)
                                    ->where('seccion',$this->seccion)
                                    ->where('anioLectivo',date('Y'))
                                    ->where('asignatura',$course->asignatura)
                                    ->where('carnet',$student->carnet)                                    
                                    ->first();
    }


    private function notaFinal($courses,$student){
            $promedio = 0;
            $ciencia_sociales_true = false;
            $ciencias_sociales = 0;
            for($sc=0;$sc<count($courses);$sc++){
                    
                $score = $this->getScore($courses[$sc],$student); 
                    if(array_search($score->nota,$this->nota_final) != ""){                    
                        if($ciencia_sociales_true){
                            $ciencias_sociales = (intval($ciencias_sociales) + intval($score->nota))/2;
                            $this->arrayPush(trim($ciencias_sociales)); 
                            $promedio = $promedio + intval($ciencias_sociales);
                            $this->index2 = $sc;
                        }else{
                            $this->index1 = $sc;
                            $ciencias_sociales = $score->nota;
                        }
                        $ciencia_sociales_true != $ciencia_sociales_true;
                    }else{
                        $this->arrayPush(trim($score->nota)); 
                        $promedio = $promedio + intval($score->nota);
                    }
            }   

            return $promedio;

    }
    private function notaParcial($courses,$student){
        $promedio = 0;
            for($sc=0;$sc<count($courses);$sc++){
                    
                $score = $this->getScore($courses[$sc],$student);
                $this->arrayPush(trim($score->nota)); 
                $promedio = $promedio + intval($score->nota);
                  
            }   

        return $promedio;
    }


    private function arrayPush($nota){
        $this->student_data = array_merge($this->student_data,array($nota));
    }

    private function getScoresAverage($students,$courses){
        $index1 = 0;  
        $index2 = 0;  
        $this->student_data = array();                   
        for($st=0;$st<count($students);$st++){

            $this->arrayPush(trim($this->averages[$st]));
            $this->arrayPush(trim($students[$st]->carnet));
            $this->arrayPush(trim($students[$st]->nombres));
            $this->arrayPush(trim($students[$st]->apellidos));
            $this->arrayPush(trim($students[$st]->sexo));
            
            $promedio = 0;
            if(intval($this->parcial == 7)){
                $promedio = $this->notaFinal($courses,$students[$st]);
            }else{
                $promedio = $this->notaParcial($courses,$students[$st]);
            }

            $promedio = $promedio / (count($courses));
            $promedio = number_format($promedio,2,'.',',');
            $this->arrayPush(trim($promedio)); 
            $scores[$st] = $this->student_data;

        }  
       
            if(intval($this->parcial == 7)){
                unset($scores[$index1+6]);    
                $this->courses[$index2] = "Ciencias Sociales";
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
      
        $courses_data = $this->getCourses($course);

        $students_data = $this->getStudent();

        $this->averages = $this->getAverages($students_data);
                  
        $this->scores = $this->getScoresAverage($students_data,$courses_data);


        return view('livewire.tutor.average-detail',['clases' => $courses_data ]);
    }
}
