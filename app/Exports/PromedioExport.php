<?php

namespace App\Exports;

use App\Models\Average;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;

class PromedioExport implements FromArray, WithHeadings {
    
    use Exportable;
    private $grado;
    private $seccion;
    private $parcial_prom;
    private $parciales =  array('','prom_ICE','prom_IICE','prom_ISemestre','prom_IIICE','prom_IVCE','prom_IISemestre','prom_notaFinal', );
    private $students;
    private $courses;
    private $clases;
    
    public function __construct($grado,$seccion,$parcial){
        $this->grado = $grado;
        $this->seccion = $seccion;
        $this->parcial = $parcial;
        $this->parcial_prom = $this->parciales[$parcial];
        $course  = getCourseByParcial($grado,$parcial);      
        $this->courses  = getAllCourses($grado,$seccion,$course);
        $this->clases   = getAllCourses($grado,$seccion,$course);
        $this->students = getStudentsByGradoSeccion($grado,$seccion);

    }

    public function headings(): array{
        $headers = array('Carnet','Nombre','Sexo');

        if(intval($this->parcial) == 7){
            $index = isNotaFinalCourses($this->clases);
            $name ='Ciencias Sociales ('.$this->clases[$index[0]]->asignatura.'/'.$this->clases[$index[1]]->asignatura.')';
            $this->clases[$index[1]]->asignatura = $name ;
            unset($this->clases[$index[0]]);    
        }

        foreach($this->clases as $clase){
            array_push($headers,$clase->asignatura);
        }
        array_push($headers,'Promedio');
        return $headers;
    }


    public function array(): array{

        $data = [];

        foreach($this->students as $index => $student){
            $data[$index] = (intval($this->parcial) == 7)?$this->notaFinal($this->courses,$student):$this->notaParcial($this->courses,$student);
        }    

        return $data;
    }

    private function notaFinal($courses,$student){
        $csb = false;
        $cs = 0;
        $nota_final_array = array("Historia","Geografía","Economía","Filosofía","Sociología");
    
            $data = array($student->carnet,$student->nombres.' '.$student->apellidos,$student->sexo);
            foreach($courses as $course){
                $score = getScoreByCourse($this->parcial,$student,$course->asignatura);
               
                if(in_array(trim($course->asignatura),$nota_final_array)){  
                    if($csb){
                        $cs = (intval($cs) + intval($score->nota))/2;
                        array_push($data,trim($cs)); 
                        $csb = false;
                    }else{
                        $cs = $score->nota;
                        $csb = true;
                    }
                }else{
                    array_push($data,$score->nota);
                }               
            }
            $average = Average::select(''.$this->parcial_prom.' as nota')->where('carnet',$student->carnet)->where('anioLectivo',env('ANIO_LECTIVO'))->first();
            array_push($data,$average->nota);
            return $data;
    }

    private function notaParcial($courses,$student){
        $data = array($student->carnet,$student->nombres.' '.$student->apellidos,$student->sexo);
        foreach ($courses as $index => $course) {
            array_push($data,getScoreByCourse($this->parcial,$student,$course->asignatura)->nota);
        }
        $average = Average::select(''.$this->parcial_prom.' as nota')->where('carnet',$student->carnet)->where('anioLectivo',env('ANIO_LECTIVO'))->first();
        array_push($data,$average->nota);
        return $data;
    }



}