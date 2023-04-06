@extends('layouts.plantilla')

@section('scripts') 
@endsection


@section('ubicacion')
Plan {{$nombre_plan}}
@endsection

@section('contenido')

<section id="encabezado" class="contact-area" style='padding:50px!important;background:#0097CE;' > 
</section>
<section id="contenido" class="contact-area" style='background:#FFF;' > 
        <div class="container">
        <div class="row">
            <div class="col-md-4 " > </div>
                <div class="col-md-4 text-center" >
                    <img src="{{$imagen_plan}}" alt="Plan {{$nombre_plan}}" style='max-width:400px;width:100%;'/>
                </div>
            <div class="col-md-4"></div>
        </div>
        <div class="col-md-12">
        <br><p></p> <br> <br>
        <div class="container">

        <div class="row center">
            <div class="col-md-12 text-center">
                <br>
                <a href="/conocer_plan/{{$nombre_plan}}" style='padding-top:20px;display:inline-block;'>
                <img src="/imgs/consultaplan.png" alt="Conocé nuestros planes" style='width:100%;display:inline-block;'>
                </a> 
                <a href="https://www.sssalud.gob.ar/misssalud/" target='_blank' style='max-width:80%;padding-top:20px;display:inline-block;'>
                <img src="/imgs/misss.png" alt="Conocé nuestros planes" style='width:100%;display:inline-block;'>
                </a> 
                <br> <br>
            </div>
        </div>
        <br>
        <div class="row" style='background:#D7EEF6;padding:20px;'>
            <div class="col-md-12 pt-10">
            <H4>PRESTACIONES AMBULATORIAS</H4> <p></p><br> <br>
            </div>
            <div class="col-md-6">
            CONSULTAS AMBULATORIAS
            </div>
            <div class="col-md-6">
            {{$consultas}}
            </div>
            <div class="col-md-12"><hr></div>
            @if($consultas_domiciliarias!='')
                <div class="col-md-6">
                CONSULTAS DOMICILIARIAS
                </div>
                <div class="col-md-6">
                {{$consultas_domiciliarias}}
                </div>
                <div class="col-md-12"><hr></div> 
            @endif 
            <div class="col-md-6">
            PRÁCTICAS BIOQUÍMICAS
            </div>
            <div class="col-md-6">
            {{$practicas_bioquimicas}}
            </div>
            <div class="col-md-12"><hr></div>
            @if($consultas_domiciliarias!='')
                <div class="col-md-6">
                PRÁCTICAS BIOQUÍMICAS NO NOMENCLADAS
                </div>
                <div class="col-md-6">
                {{$practicas_bioquimicas_no_nomencladas}}
                </div>
                <div class="col-md-12"><hr></div> 
            @endif 
            <div class="col-md-6">            
            PRÁCTICAS DE DIAGNOSTICO Y TRATAMIENTO (6)
            </div>
            <div class="col-md-6">
            {{$practicas_diagnostico}}
            </div>
            <div class="col-md-12"><hr></div>
            <div class="col-md-6">
            FONOAUDIOLOGÍA
            </div>
            <div class="col-md-6">
            {{$fonoaudiologia}}
            </div> 
            <div class="col-md-12"><hr></div>
            <div class="col-md-6">
            FISIOTERAPIA Y KINESIOLOGIA
            </div>
            <div class="col-md-6">
            {!! $fisioterapia!!}
            </div>  
            <div class="col-md-12"><hr></div>
            @if($material_reactivo_ambulatorio!='')
                <div class="col-md-6">
                MATERIAL RADIOACTIVO Y ANESTESIA
                </div>
                <div class="col-md-6">
                {{$material_reactivo_ambulatorio}}
                </div> 
                <div class="col-md-12"><hr></div> 
            @endif 
        </div>
        <div class="row" style='padding:20px;'>
            <div class="col-md-12 pt-10">
            <H4>MEDICAMENTOS    </H4> <p></p><br> <br>
            </div>
            <div class="col-md-6">
            MEDICAMENTOS AMBULATORIOS (2)
            </div>
            <div class="col-md-6">
            {!! $medicamentos_ambulatorios !!}
            </div>
            <div class="col-md-12"><hr></div>
            <div class="col-md-6">
            MEDICAMENTOS EN INTERNACION
            </div>
            <div class="col-md-6">
            {!! $medicamentos_internacion !!}
            </div> 
            <div class="col-md-12"><hr></div>
        </div>
        <div class="row" style='background:#D7EEF6;padding:20px;'>
            <div class="col-md-12 pt-10">
            <H4>SERVICIO DE INTERNACION    </H4> <p></p><br> <br>
            </div>
            <div class="col-md-6">
            INTERNACION CLINICA Y QUIRURGICA
            </div>
            <div class="col-md-6">
            {!!$internacion_clinica_quirurgica!!}
            </div>
            <div class="col-md-12"><hr></div>
            <div class="col-md-6">
            INTERVENCIONES QUIRURGICAS NOMENCLADAS
            </div>
            <div class="col-md-6">
            {!!$intervenciones_quirurgicas!!}
            </div>
            <div class="col-md-12"><hr></div><div class="col-md-6">
            INTERNACION PSIQUIATRICA
            </div>
            <div class="col-md-6">
            {!!$internacion_psiquiatrica!!}
            </div>
            <div class="col-md-12"><hr></div><div class="col-md-6">
            MATERIAL RADIOACTIVO Y ANESTESIA
            </div>
            <div class="col-md-6">
            {!!$material_radioactivo!!}
            </div>              
            <div class="col-md-12"><hr></div>
            @if($cirugias_video!='') 
                <div class="col-md-6">
                CIRUGÍAS POR VIDEO
                </div>
                <div class="col-md-6">
                {{$cirugias_video}}
                </div>  
                <div class="col-md-12"><hr></div>
            @endif 
        </div>
        <div class="row" style='padding:20px;'>
            <div class="col-md-12 pt-10">
            <H4>PRÓTESIS Y ÓRTESIS    </H4> <p></p><br> <br>
            </div>
            <div class="col-md-6">
            PROTESIS INTERNAS E IMPLANTES (PMO) - (4)
            </div>
            <div class="col-md-6">
            {!! $protesis_internas !!}
            </div>
            <div class="col-md-12"><hr></div>
            <div class="col-md-6">
            PROTESIS EXTERNAS U ORTESIS (PMO) - (4)
            </div>
            <div class="col-md-6">
            {!! $protesis_externas !!}
            </div>
            <div class="col-md-12"><hr></div>
            <div class="col-md-6">
            ORTOPEDIA (5)
            </div>
            <div class="col-md-6">
            {!! $ortopedia !!}
            </div>
            <div class="col-md-12"><hr></div>
            <div class="col-md-6">
            AUDIFONOS
            </div>
            <div class="col-md-6">
            {!! $audifonos !!}
            </div> 
            <div class="col-md-12"><hr></div>
        </div>
        <div class="row" style='background:#D7EEF6;padding:20px;'>
            <div class="col-md-12 pt-10">
            <H4>SERVICIO DE SALUD MENTAL    </H4> <p></p><br> <br>
            </div>
            <div class="col-md-6"> 
            PSICOLOGÍA
            </div>
            <div class="col-md-6">
            {!!$psicologia!!}
            </div>
            <div class="col-md-12"><hr></div>
            <div class="col-md-6">
            PSIQUIATRIA
            </div>
            <div class="col-md-6">
            {!!$psiquiatria!!}
            </div>
            <div class="col-md-12"><hr></div><div class="col-md-6">
            PSICOPEDAGOGÍA
            </div>
            <div class="col-md-6">
            {!!$psicopedagogia!!}
            </div>
            <div class="col-md-12"><hr></div>
        </div>
        <div class="row" style='padding:20px;'>
            <div class="col-md-12 pt-10">
            <H4>ODONTOLOGÍA   </H4> <p></p><br> <br>
            </div>
            <div class="col-md-6">
            ODONTOLOGÍA
            </div>
            <div class="col-md-6">
            {!! $odontologia !!}
            </div>
            
            <div class="col-md-12"><hr></div>
            <div class="col-md-6">
            CONSULTAS ODONTOLÓGICAS
            </div>
            <div class="col-md-6">
            {!! $odontologia_consultas !!}
            </div>
            <div class="col-md-12"><hr></div>
            @if($odontologia_protesis!='') 
                <div class="col-md-6">
                ODONTOLOGÍA - PRÓTESIS (7)
                </div>
                <div class="col-md-6">
                {{$odontologia_protesis}}
                </div>  
                <div class="col-md-12"><hr></div>
            @endif 
            @if($odontologia_implantes!='') 
                <div class="col-md-6">
                ODONTOLOGÍA - IMPLANTES (7)
                </div>
                <div class="col-md-6">
                {{$odontologia_implantes}}
                </div>  
                <div class="col-md-12"><hr></div>
            @endif 

            <div class="col-md-6">
            ODONTOLOGÍA - ORTODONCIA
            </div>
            <div class="col-md-6">
            {!! $odontologia_ortodoncia !!}
            </div>
            <div class="col-md-12"><hr></div>


        </div>
        <div class="row" style='background:#D7EEF6;padding:20px;'>
            <div class="col-md-12 pt-10">
            <H4>OFTALMOLOGÍA </H4> <p></p><br> <br>
            </div>
            <div class="col-md-6"> 
            LENTES AÉREOS COMUNES C/ARMAZÓN DEL MUESTRARIO
            </div>
            <div class="col-md-6">
            {!!$lentes_comunes!!}
            </div>
            <div class="col-md-12"><hr></div>
            <div class="col-md-6">
            LENTES AÉREOS ORGANICOS COMUNES C/ ARMAZÓN DEL MUESTRARIO
            </div>
            <div class="col-md-6">
            {!!$lentes_organicos!!}
            </div>
            <div class="col-md-12"><hr></div><div class="col-md-6">
            LENTES BIFOCALES C/ARMAZON DEL MUESTRARIO
            </div>
            <div class="col-md-6">
            {!!$lentes_bifocales!!}
            </div>
            <div class="col-md-12"><hr></div>
            @if($cirugia_refractaria_laser!='') 
                <div class="col-md-6">
                CIRUGÍA REFRACTARIA DE OJOS CON EXCIMER LASER
                </div>
                <div class="col-md-6">
                {{$cirugia_refractaria_laser}}
                </div>  
                <div class="col-md-12"><hr></div>
            @endif
            @if($cirugia_refractaria_intraocular!='') 
                <div class="col-md-6">
                CIRUGÍA REFRACTARIA DE OJOS CON LENTE INTRAOCULAR
                </div>
                <div class="col-md-6">
                {{$cirugia_refractaria_intraocular}}
                </div>  
                <div class="col-md-12"><hr></div>
            @endif
        </div>
        <div class="row" style='padding:20px;'>
            <div class="col-md-12 pt-10">
            <H4>NUTRICIÓN   </H4> <p></p><br> <br>
            </div>
            <div class="col-md-6">
            NUTRICIÓN
            </div>
            <div class="col-md-6">
            {!! $nutricion !!}
            </div>
             
            <div class="col-md-12"><hr>
        <p><br></p><br></div>
        </div>
        

        @if($observaciones!='')
        <div class="row" style='padding:20px;background:#DDD;border-radius:6px;'>
            <div class="col-md-12">
            {!! $observaciones !!}
            </div>
        </div>
        @endif
        </div>
 
        	 

        
        
        
        </div>
        </div>
</section>

 
@endsection