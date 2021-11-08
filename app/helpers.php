<?php

$parcial_cuantitativo = array('','ICE_cuant','IICE_cuant','ISemestre_cuant','IIICE_cuant','IVCE_cuant','IISemestre_cuant','notaFinal_cuant');
$promedio_cuantitativo = array('','prom_ICE','prom_IICE','prom_ISemestre','prom_IIICE','prom_IVCE','prom_IISemestre','prom_notaFinal');

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