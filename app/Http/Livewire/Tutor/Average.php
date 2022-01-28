<?php

namespace App\Http\Livewire\Tutor;

use Livewire\Component;

class Average extends Component{

    public $title;    
    public $grade;
    public $seccion;
    public $parcial;
    private $par = array('','Primer Parcial','Segundo Parcial','Primer Semestre','Tercer Parcial','Cuarto Parcial','Segundo Semestre','Nota Final');

    public function mount($grado,$seccion,$parcial){
        $this->grade = str_replace('-',' ',$grado); 
        $this->parcial = $parcial;
        $this->seccion = $seccion;
        $this->title = 'Promedio del '.$this->par[$parcial].' del '.$this->grade .' '. $seccion;
      

       //<livewire:tutor.average-detail :grade="$grade" :seccion="$seccion" :parcial="$parcial" :wire:key="'promedio-parciales'" />

    }    
    
    public function render(){
        $course   = getCourseByParcial($this->grade,$this->parcial);      
        $courses  = getAllCourses($this->grade,$this->seccion,$course);
        $clases   = getAllCourses($this->grade,$this->seccion,$course);
        $students = getStudentsByGradoSeccion($this->grade,$this->seccion);
    
        if(intval($this->parcial) == 7){
            $index = isNotaFinalCourses($clases);
            $name ='Ciencias Sociales ('.$clases[$index[0]]->asignatura.'/'.$clases[$index[1]]->asignatura.')';
            $clases[$index[1]]->asignatura = $name ;
            unset($clases[$index[0]]);    
        }

            return view('livewire.tutor.average',['clases' => $clases,'courses' => $courses,'estudiantes' => $students ])->layout('layouts.main');
        }
}
