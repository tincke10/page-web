<?php

namespace App\Exports;

use App\Consulta;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConsultasParaContactarExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Apellido',
            'Nombres', 
            'Documento',
            'E-mail',
            'Prefijo',
            'Teléfono',
            'Localidad',
            'Consulta',
            'Estado',
            'Area',
            'Observaciones',
            'Medio',
            'Fecha Reprogramacion'
        ];
    }
    public function collection()
    {
         //$users = DB::table('Users')->select('id','name', 'email')->get();
         //$users = DB::table('Users')->get();
         //$consultas = DB::table('consultas')->get();
         $consultas = DB::table('consultas')
         ->select('id','apellido','nombres','nrodocumento','email','prefijo','telefono','localidad','consulta','estado','area','observaciones','medio','fecha_reprogramacion')
            ->where('estado','EN CURSO')
            ->whereRaw('updated_at < CURRENT_DATE-5')
            ->orderBy('updated_at','asc')
            ->get();
         return $consultas;

    }
}