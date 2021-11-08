<?php

namespace App\Http\Livewire\Tutor;

use Livewire\Component;
use App\Models\Score as Scores;

class Average extends Component{
    public $title;    
    public $grade;
    public $seccion;
    public $parcial;
    private $par = array('','Primer Parcial','Segundo Parcial','Primer Semestre','Tercer Parcial','Cuarto Parcial','Segundo Semestre','Nota Final');
    public $index; 
    public $index1; 
    public $index2; 


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
        return Scores::select('asignatura')
                    ->where('grado',$this->grade)
                    ->where('seccion',$this->seccion)
                    ->where('anioLectivo',date('Y'))
                    ->where('asignatura','!=','Conducta')
                    ->where('asignatura','!=',$course) 
                    ->distinct('asignatura')
                    ->orderBy('asignatura','asc')
                    ->get();
    }

    private function getStudent($grade,$seccion){
        return Scores::select('carnet','nombres','apellidos','sexo','grado','seccion' )
                    ->where('grado',$grade)
                    ->where('seccion',$seccion)
                    ->where('anioLectivo',date('Y'))
                    ->distinct('carnet')
                    ->orderBy('apellidos','asc')
                    ->orderBy('nombres','asc')
                    ->get();
    }

    private function notaFinalCourses($courses){
        $ciencia_sociales_true = false;
        for($sc=0;$sc<count($courses);$sc++){                
           if(in_array(trim($courses[$sc]->asignatura),$this->nota_final_array)){  
                if($ciencia_sociales_true){
                    $this->index2 = $sc;
                    $ciencia_sociales_true = false;
                }else{
                    $this->index1 = $sc;
                    $ciencia_sociales_true = true;
                }                   
            } 
        }      
    }

    public function mount($grado,$seccion,$parcial){
        $this->grade = str_replace('-',' ',$grado); 
        $this->parcial = $parcial;
        $this->seccion = $seccion;
        $this->title = 'Promedio del '.$this->par[$parcial].' del '.$this->grade .' '. $seccion;
      

       //<livewire:tutor.average-detail :grade="$grade" :seccion="$seccion" :parcial="$parcial" :wire:key="'promedio-parciales'" />

    }

    
    
    public function render(){
    $course = $this->whoCourse($this->grade,$this->parcial);      
    $courses = $this->getCourses($course);
    $clases = $courses;
    $students = $this->getStudent($this->grade,$this->seccion);
    if(intval($this->parcial == 7)){
        $this->notaFinalCourses($courses);
        $name='Ciencias Sociales ('.$clases[$this->index1]->asignatura.'/'.$clases[$this->index2]->asignatura.')';
        $clases[$this->index2]->asignatura = $name ;
        unset($clases[$this->index1]);    
    }

         return view('livewire.tutor.average',['clases' => $clases,'courses' => $courses,'estudiantes' => $students ])->layout('layouts.main');
    }
}
