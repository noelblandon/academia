<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Score as Scores;
use Illuminate\Support\Facades\Redirect;


class CheckTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){
        $uri_param = str_replace("/score","",$_SERVER["REDIRECT_URL"]);
        $uri_param = explode("/", $uri_param);
        
        $data = Scores::select('idnotas')->where('docente',auth()->user()->fullname)
                                ->where('anioLectivo',env('ANIO_LECTIVO'))    
                                ->where('grado',str_replace('-',' ',$uri_param[1]))                         
                                ->where('seccion',$uri_param[2]) 
                                ->where('asignatura',$uri_param[3]) 
                                ->orderBy('apellidos','asc')
                                ->distinct('carnet')
                                ->get()->count();

  
        if ($data > 1) {
            return $next($request);
        }

        return redirect('/');
    }
}
