<?php

$parcial_cuantitativo = array('','ICE_cuant','IICE_cuant','ISemestre_cuant','IIICE_cuant','IVCE_cuant','IISemestre_cuant','notaFinal_cuant');
$promedio_cuantitativo = array('','prom_ICE','prom_IICE','prom_ISemestre','prom_IIICE','prom_IVCE','prom_IISemestre','prom_notaFinal');
$nota_final_array = array("Historia","Geografía","Economía","Filosofía","Sociología");
function getYear() {

    return [
                date("Y",strtotime('-1 years')),
                date('Y'),
                date("Y",strtotime('+1 years'))
           ]; 
}


function setUrl($value){

    return strtolower(str_replace(' ','-',$value));

}

function stripeTable($value){

    if($value % 2 === 0 )
    return 'class=table-active';

}

 function splitString($string, $var = ' '){
    return explode ("{$var}", $string); 
 }   


 function genderPicture($gender): String{

    $male = array("assets/images/avatar-6.jpg","assets/images/avatar-7.jpg","assets/images/avatar-8.jpg");
    $female = array("assets/images/avatar-1.jpg","assets/images/avatar-2.jpg","assets/images/avatar-3.jpg","assets/images/avatar-4.jpg","assets/images/avatar-5.jpg");
    return ($gender == "Masculino")?$male[array_rand($male)]:$female[array_rand($female)];
 }

 function getCourseByParcial($grade,$parcial){
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

function getAllCourses($grado,$seccion,$course){
    return \App\Models\Score::select('asignatura')
                ->where('grado',$grado)
                ->where('seccion',$seccion)
                ->where('anioLectivo',env('ANIO_LECTIVO'))
                ->where('asignatura','!=','Conducta')
                ->where('asignatura','!=',$course) 
                ->distinct('asignatura')
                ->orderBy('asignatura','asc')
                ->get();
}

function getStudentsByGradoSeccion($grado,$seccion){
    return \App\Models\Score::select('carnet','nombres','apellidos','sexo','grado','seccion' )
                    ->where('grado',$grado)
                    ->where('seccion',$seccion)
                    ->where('anioLectivo',env('ANIO_LECTIVO'))
                    ->distinct('carnet')
                    ->orderBy('apellidos','asc')
                    ->orderBy('nombres','asc')
                    ->get();
}

function isNotaFinalCourses($courses){
    $nota_final_array = array("Historia","Geografía","Economía","Filosofía","Sociología");
    $ciencia_sociales_true = false;
    $index = [];
    for($sc=0;$sc<count($courses);$sc++){                
       if(in_array(trim($courses[$sc]->asignatura),$nota_final_array)){  
            if($ciencia_sociales_true){
                $index[1] = $sc;
                $ciencia_sociales_true = false;
            }else{
                $index[0] = $sc;
                $ciencia_sociales_true = true;
            }                   
        } 
    }    
    
    return $index;
}

function getScoreByCourse($parcial,$student,$course){
    $parcial_cuant = array('','ICE_cuant','IICE_cuant','ISemestre_cuant','IIICE_cuant','IVCE_cuant','IISemestre_cuant','notaFinal_cuant');
    return \App\Models\Score::select(''.$parcial_cuant[intval($parcial)].' as nota' )
                                ->where('grado',$student->grado)
                                ->where('seccion',$student->seccion)
                                ->where('anioLectivo',env('ANIO_LECTIVO'))
                                ->where('asignatura',$course)
                                ->where('carnet',$student->carnet)                                    
                                ->first();
}