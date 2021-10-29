<?php

namespace App\View\Components\layouts;

use Illuminate\View\Component;
use Session;

class aside extends Component
{
    public $picture;    
    public $class = array('score'=>'','tutor'=>'');
    public function __construct()
    {
        $this->picture= Session::get('url');
        if(request()->segment(1)){
            $class['score'] = 'active';
        }
        if(request()->segment(1)){
            $class['tutor'] = 'active';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.aside');
    }
}
