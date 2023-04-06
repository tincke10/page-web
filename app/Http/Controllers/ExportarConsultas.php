<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;

use App\Exports\ConsultasExport;
use Maatwebsite\Excel\Facades\Excel;


class ExportarConsultas extends Controller
{
    public function export(){
        return Excel::download(new ConsultasExport, 'consultas.xlsx');
    }
}
