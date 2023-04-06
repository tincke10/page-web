<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;

use App\Exports\ConsultasReprogramadasExport;
use Maatwebsite\Excel\Facades\Excel;


class ExportarConsultasReprogramadas extends Controller
{
    public function export(){
        return Excel::download(new ConsultasReprogramadasExport, 'consultas_reprogramadas.xlsx');
    }
}
