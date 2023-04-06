<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;

use App\Exports\ConsultasParaContactarExport;
use Maatwebsite\Excel\Facades\Excel;


class ExportarConsultasParaContactar extends Controller
{
    public function export(){
        return Excel::download(new ConsultasParaContactarExport, 'consultas_para_contactar.xlsx');
    }
}
