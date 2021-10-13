<?php


function getYear() {

    return [
                date("Y",strtotime('-1 years')),
                date('Y'),
                date("Y",strtotime('+1 years'))
           ]; 
}


function urlSet($value){

    return str_replace(' ','-',$value);

}
