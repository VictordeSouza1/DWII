<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datatable extends Component {
    
    public $title;
    public $crud;
    public $header;
    public $data;
    public $especialidades;
    public $hide;

    public function __construct($title, $crud, $header, $data, $especialidades, $hide) {

        $this->title = $title;   
        $this->crud = $crud;
        $this->header = $header;
        $this->data = $data;
        $this->especialidades = $especialidades;
        $this->hide = $hide;
    }

    public function render() {
        return view('components.datatable');
    }
}
