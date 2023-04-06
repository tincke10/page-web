@extends('layouts.plantilla')

@section('scripts') 
@endsection


@section('ubicacion')
Conocer Plan
@endsection

@section('contenido')
<div id="app">
    <!--<example-component></example-component> -->


    
    <section id="formulario" class="contact-area" style='background:#0097CE;' > 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-30">
                        <h3 class="title">Consultar mi plan</h3>
                        <!--<p class="text">Completá el formulario para conocer los valores del plan que elijas.</p>-->

                        @if($errors->any()) 
                        <div class="error-message" style='margin-top:20px;padding:20px;background:red;box-shadow:0px 0px 2px black;border-radius:5px;'>
                        <div style='color:white;'>No se pudo enviar el formulario, por favor revise los errores.</div>  
                        </div> 
                        @endif

                        @{{ $resultado ?? '' }}
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-wrapper form-style-two pt-25 pb-25 pl-25 pr-25" style='background:#B8E2F1;border-radius:15px;'>
                        <h4 class="contact-title pb-10"><i class="lni lni-user"></i> Datos del titular</span></h4>
                        
                        <form id="conocerplan"  action="{{url('conocer_plan')}}" method="POST"  >
                        @csrf
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Apellido</label>
                                        <div class="input-items default">
                                            <input name="apellido" type="text" placeholder="Apellido"  value="{{old('apellido')}}" data-old="{{old('apellido')}}"> 
                                            <div class="validate">{!!$errors->first('apellido','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Nombres</label>
                                        <div class="input-items default">
                                            <input name="nombres" id="nombres" type="text" placeholder="Nombres" value="{{old('nombres')}}" data-old="{{old('nombres')}}" > 
                                            <div class="validate">{!!$errors->first('nombres','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Sexo</label>
                                        <div class="input-items default">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="row col-6">
                                                        <input name="sexo" type="radio" value='Masculino' style='display:inline-block;width:30px;float:left;'
                                                        @if(old('sexo') =='Masculino')
                                                            checked
                                                        @endif
                                                        
                                                        >  
                                                        <div style='display:inline-block;line-height:45px;'>&nbsp;&nbsp;Masculino</div>
                                                    </div>
                                                    <div class="row col-6">
                                                        <input name="sexo" type="radio" value='Femenino' style='display:inline-block;width:30px;'
                                                        @if(old('sexo') =='Femenino')
                                                            checked
                                                        @endif
                                                        
                                                        >
                                                        <div style='display:inline-block;line-height:45px;'>&nbsp;&nbsp;Femenino</div>
                                                        
                                                    </div>
                                                    <div class="col-md-12">
                                                    <div class="validate">{!!$errors->first('sexo','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                                    </div>
                                                </div>
                                            </div>


                                            
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Fecha de Nacimiento</label>
                                        <div class="input-items default">
                                            <input name="fecha_nacimiento" type="date" placeholder="Fecha de Nacimiento" value="{{old('fecha_nacimiento')}}" data-old="{{old('fecha_nacimiento')}}">  
                                            <div class="validate">{!!$errors->first('fecha_nacimiento','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Nro. de Documento</label>
                                        <div class="input-items default">
                                            <input name="nrodocumento" type="text" placeholder="Nro. de Documento" value="{{old('nrodocumento')}}" > 
                                            <i class="lni lni-user"></i>
                                            <div class="validate">{!!$errors->first('nrodocumento','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                     <label>Provincia</label>
                                        <div class="select-items select input-items default">
                                            <SELECT v-model='selected_provincia' @change='loadLocalidades' style='width: 100%;
                                            height: 44px;
                                            border: 2px solid gray;
                                            padding-left: 12px;
                                            padding-right: 12px;
                                            border-radius:5px;
                                            position: relative;
                                            font-size: 16px;   color: #6c6c6c;' id='provincia' name='provincia' data-old="{{old('provincia')}}"> 
                                            @foreach($provincias as $prov)
                                                <option value="{{$prov->id}}" >
                                                {{$prov->nombre}}
                                                </option>
                                            @endforeach
                                            </SELECT>
                                            <i class="lni lni-card"></i>
                                        </div></div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                     <label>Localidad</label>
                                        <div class="select-items select input-items default">
                                            <SELECT v-model='selected_localidad' style='width: 100%;
                                            height: 44px;
                                            border: 2px solid gray;
                                            border-radius:5px;
                                            padding-left: 12px;
                                            padding-right: 12px;
                                            position: relative;
                                            font-size: 16px;   color: #6c6c6c;' id='localidad' name='localidad' data-old="{{old('localidad')}}">
                                                <option v-for='localidad in localidades' v-bind:value='localidad.id'>   
                                                @{{localidad.nombre}}
                                                </option>  
                                            </SELECT>
                                            <i class="lni lni-card"></i>
                                            <div class="validate">{!!$errors->first('localidad','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                        </div></div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Email</label>
                                        <div class="input-items default">
                                            <input type="email" name="email" placeholder="Email"  value="{{old('email')}}">
                                            <i class="lni lni-envelope"></i>
                                            <div class="validate">{!!$errors->first('email','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Teléfono</label>
                                        <div class="input-items default">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="row col-4">
                                                        <input  name="prefijo" type="text" name="prefijo" placeholder="Prefijo"  value="{{old('prefijo')}}">   
                                                    </div>
                                                    <div class="row col-1"> 
                                                    </div>
                                                    <div class="row col-7">
                                                        <input name="telefono" type="text" name="telefono" placeholder="Número"  value="{{old('telefono')}}">  
                                                    </div>
                                                    <div class="validate">{!!$errors->first('prefijo','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                                    <div class="validate">{!!$errors->first('telefono','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                                </div>
                                            </div>


                                            
                                        </div>
                                    </div> <!-- form input -->
                                </div>

                                
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                     <label>A continuación, indica cuál es el importe de tu recibo de sueldo mensual. Recuerda que debes colocar el valor correspondiente al sueldo bruto. </label>
                                     <div class="input-items default">
                                             
                                     <input type="decimal" name="sueldo" placeholder="Sueldo"  value="{{old('sueldo')}}">
                                            <i class="lni lni-wallet"></i>
                                            <div class="validate">{!!$errors->first('sueldo','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                            </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6"><!--
                                    <div class="form-input mt-25">
                                     <label>Tipo de contribuyente</label>
                                        <div class="select-items select input-items default">
                                            <SELECT v-model='tipo_contribuyente' style='width: 100%;
                                            height: 44px;
                                            border: 2px solid gray;
                                            border-radius:5px;
                                            padding-left: 12px;
                                            padding-right: 12px;
                                            position: relative;
                                            font-size: 16px;   color: #6c6c6c;' id='tipo_contribuyente' name='tipo_contribuyente'>
                                             
                                                <option  value='RELACIÓN DE DEPENDENCIA' selected>RELACIÓN DE DEPENDENCIA</option>  
                                                <option  value='MONOTRIBUTISTA'>MONOTRIBUTISTA</option>  
                                                <option  value='SERVICIO DOMÉSTICO'>SERVIVCIO DOMÉSTICO</option>  
                                               

                                            </SELECT>
                                            <i class="lni lni-card"></i>
                                        </div></div>   -->
                                </div>

                                <input type="hidden" name="plan" id="plan" value='superior' />
                                <!--<div class="col-md-6">
                                    <div class="form-input mt-25">
                                     <label>Seleccione el plan </label>
                                        <div class="select-items select input-items default">
                                            <SELECT  style='width: 100%;
                                            height: 44px;
                                            border: 2px solid gray;
                                            border-radius:5px;
                                            padding-left: 12px;
                                            padding-right: 12px;
                                            position: relative;
                                            font-size: 16px;   color: #6c6c6c;' id='plan' name='plan'>
                                             
                                                <option  value='PLAN SUPERIOR' 
                                                    @if($plan=='superior')
                                                    selected
                                                    @endif
                                                    >PLAN SUPERIOR</option>  
                                                <option  value='PLAN CLASICO' 
                                                    @if($plan=='clasico')
                                                    selected
                                                    @endif
                                                    >PLAN CLÁSICO</option>  
                                                <option  value='PLAN JOVEN' 
                                                    @if($plan=='joven')
                                                    selected
                                                    @endif
                                                    >PLAN JÓVEN</option>  
                                               

                                            </SELECT>
                                            <i class="lni lni-card"></i>
                                        </div></div> 
                                </div> 
                                <div class="col-md-6"></div>
                                 -->
                                <div class="col-md-12">
                                <p></p><br> <br>
                                <h4 class="contact-title pb-10"><i class="lni lni-users"></i>  Grupo familiar</span></h4>
                                
                                </div>

                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Cónyuge o concubino</label>
                                        <div class="input-items default">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="row col-6">
                                                        <input name="conyuge" id="conyuge" v-model="conyuge" @change='showDatosConyuge' type="radio" value='Si' style='display:inline-block;width:30px;float:left;' 
                                                        data-old="{{old('conyuge')}}" 
                                                        @if(old('conyuge') =='Si')
                                                            checked
                                                        @endif
                                                        >  
                                                        <div style='display:inline-block;line-height:45px;'>&nbsp;&nbsp;Si</div>
                                                    </div>
                                                    <div class="row col-6">
                                                        <input name="conyuge" v-model="conyuge" @change='showDatosConyuge' type="radio" value='No' style='display:inline-block;width:30px;'
                                                        data-old="{{old('conyuge')}}" 
                                                        @if(old('conyuge') =='No')
                                                            checked
                                                        @endif
                                                        >
                                                        <div style='display:inline-block;line-height:45px;'>&nbsp;&nbsp;No</div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="validate">{!!$errors->first('conyuge','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                                    </div>
                                                </div>
                                            </div>


                                            
                                        </div>
                                    </div> <!-- form input --> 
                                </div>

                            <!-- DATOS DEL CONYUGE --> 
                            </div>
                            <div class="row" id='datos_conyuge' style='background:#def4fc;border-radius:10px;margin-top:15px;padding-bottom:25px;'>
                            <div class="col-md-12  " >
                            <br>
                            <h2>Datos del cónyuge o concubino</h2>

                            </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Apellido</label>
                                        <div class="input-items default">
                                            <input name="apellido_conyuge" type="text" placeholder="Apellido" value="{{old('apellido_conyuge')}}" > 
                                            <div class="validate">{!!$errors->first('apellido_conyuge','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Nombres</label>
                                        <div class="input-items default">
                                            <input name="nombres_conyuge" type="text" placeholder="Nombres" value="{{old('nombres_conyuge')}}" > 
                                            <div class="validate">{!!$errors->first('nombres_conyuge','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Sexo</label>
                                        <div class="input-items default">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="row col-6">
                                                        <input name="sexo_conyuge" type="radio" value='Masculino' style='display:inline-block;width:30px;float:left;'
                                                        @if(old('sexo_conyuge') =='Masculino')
                                                            checked
                                                        @endif
                                                         >  
                                                        <div style='display:inline-block;line-height:45px;'>&nbsp;&nbsp;Masculino</div>
                                                    </div>
                                                    <div class="row col-6">
                                                        <input name="sexo_conyuge" type="radio" value='Femenino' style='display:inline-block;width:30px;'
                                                        @if(old('sexo_conyuge') =='Femenino')
                                                            checked
                                                        @endif
                                                        >
                                                        <div style='display:inline-block;line-height:45px;'>&nbsp;&nbsp;Femenino</div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="validate">{!!$errors->first('sexo_conyuge','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                                    </div>
                                                </div>
                                            </div>


                                            
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                </div>

                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Fecha de Nacimiento</label>
                                        <div class="input-items default">
                                            <input name="fecha_nacimiento_conyuge" type="date" placeholder="Fecha de Nacimiento" value="{{old('fecha_nacimiento_conyuge')}}" > 
                                            <div class="validate">{!!$errors->first('fecha_nacimiento_conyuge','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Nro. de Documento</label>
                                        <div class="input-items default">
                                            <input name="nrodocumento_conyuge" type="text" placeholder="Nro. de Documento" value="{{old('nrodocumento_conyuge')}}" > 
                                            <div class="validate">{!!$errors->first('nrodocumento_conyuge','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                        </div>
                                    </div> <!-- form input -->
                                </div>

                               
                            </div>
                            <div class="row" >
                            <!-- datos de los hijos-->
                            <div class="col-md-6">
                                    <div class="form-input mt-25">
                                     <label>Cantidad de hijos menores de 21 años</label>
                                        <div class="select-items select input-items default">
                                            <SELECT name='hijos_menores' style='width: 100%;
                                            height: 44px;
                                            border: 2px solid gray;
                                            border-radius:5px;
                                            padding-left: 12px;
                                            padding-right: 12px;
                                            position: relative;
                                            font-size: 16px;   color: #6c6c6c;' id='hijos_menores' name='hijos_menores'>
                                             
                                                <option  value='0' 
                                                @if(old('hijos_menores')=='0')
                                                    selected
                                                @endif
                                                >0</option>  
                                                <option  value='1'
                                                @if(old('hijos_menores')=='1')
                                                    selected
                                                @endif
                                                >1</option>  
                                                <option  value='2'
                                                @if(old('hijos_menores')=='2')
                                                    selected
                                                @endif
                                                >2</option>  
                                                <option  value='3'
                                                @if(old('hijos_menores')=='3')
                                                    selected
                                                @endif
                                                >3</option>  
                                                <option  value='4'
                                                @if(old('hijos_menores')=='4')
                                                    selected
                                                @endif>4</option>  
                                                <option  value='5'
                                                @if(old('hijos_menores')=='5')
                                                    selected
                                                @endif
                                                >5</option>  
                                                <option  value='6'
                                                @if(old('hijos_menores')=='6')
                                                    selected
                                                @endif
                                                >6</option>  
                                               

                                            </SELECT>
                                            <i class="lni lni-card"></i>
                                        </div></div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                     <label>Cantidad de hijos de entre 21 y 25 años que estudian</label>
                                        <div class="select-items select input-items default">
                                            <SELECT name='hijos_mayores' style='width: 100%;
                                            height: 44px;
                                            border: 2px solid gray;
                                            border-radius:5px;
                                            padding-left: 12px;
                                            padding-right: 12px;
                                            position: relative;
                                            font-size: 16px;   color: #6c6c6c;' id='hijos_mayores' name='hijos_mayores'>
                                             
                                             <option  value='0' 
                                                @if(old('hijos_mayores')=='0')
                                                    selected
                                                @endif
                                                >0</option>  
                                                <option  value='1'
                                                @if(old('hijos_mayores')=='1')
                                                    selected
                                                @endif
                                                >1</option>  
                                                <option  value='2'
                                                @if(old('hijos_mayores')=='2')
                                                    selected
                                                @endif
                                                >2</option>  
                                                <option  value='3'
                                                @if(old('hijos_mayores')=='3')
                                                    selected
                                                @endif
                                                >3</option>  
                                                <option  value='4'
                                                @if(old('hijos_mayores')=='4')
                                                    selected
                                                @endif>4</option>  
                                                <option  value='5'
                                                @if(old('hijos_mayores')=='5')
                                                    selected
                                                @endif
                                                >5</option>  
                                                <option  value='6'
                                                @if(old('hijos_mayores')=='6')
                                                    selected
                                                @endif
                                                >6</option>  
                                               

                                            </SELECT>
                                            <i class="lni lni-card"></i>
                                        </div></div> <!-- form input -->
                                </div>
                                
                                <div class="col-md-12 pt-15">
                                
                                
                                {!! htmlFormSnippet() !!}
                                
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-input light-rounded-buttons mt-30">
                                        <input type='submit' class="main-btn light-rounded-two" value= 'Realizar consulta de plan' />
                                    </div> <!-- form input -->
                                </div>
                            </div> <!-- row -->
                        </form>
                    </div> <!-- contact wrapper form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>


    <!--====== CONTACT PART ENDS ======-->
    </div>
<script src="{{ asset('js/app.js')}}"></script>

@endsection