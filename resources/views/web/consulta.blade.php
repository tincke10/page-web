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
                        <h3 class="title">Envianos tu consulta y te asesoramos</h3>

                        <hr style="color:white;border: 1px solid white;"></hr>
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
                <div class="col-lg-9">
                    <div class="contact-wrapper form-style-two pt-25 pb-25 pl-25 pr-25" style='background:#B8E2F1;border-radius:15px;'>
                        <h4 class="contact-title pb-10"><i class="lni lni-add-files"></i> Consulta / Reclamo</span></h4>
                        
                        <form id="consulta"  action="{{url('consulta')}}" method="POST"  >
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
 

                                <div class="col-md-12">
                                    <div class="form-input mt-25">
                                        <label>Consulta</label>
                                        <div class="input-items default">
                                            <textarea name="consulta" type="text" name="consulta" >
                                            {{old('consulta')}}
                                            </textarea>
                                            <div class="validate">{!!$errors->first('consulta','<br/><div style="color:red;">:message</div><br/>')!!}</div>
                                        </div>
                                    </div> <!-- form input -->
                                </div>

                                <div class="col-md-12 pt-15">
                                
                                
                                {!! htmlFormSnippet() !!}
                                
                                </div>


                                <div class="col-md-12">
                                    <div class="form-input light-rounded-buttons mt-30">
                                        <input type='submit' class="main-btn light-rounded-two" value= 'Realizar consulta' />
                                    </div> <!-- form input -->
                                </div>
                            </div> <!-- row -->
                        
                        </form>
                    </div> <!-- contact wrapper form -->
                </div>
                <div class="col-md-3">
                    <br>
                <h4 style='color:white;'>Impresión de comprobantes</h4> <br> <br>
                <a href="http://www.ammasalud.com.ar/autogestion/">
                    <img src="imgs/autogestion.jpg" alt="Acceso a Autogestión" style='width:100%;border-radius:9px;'/>
                </a> 
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>


    <!--====== CONTACT PART ENDS ======-->
    </div>
<script src="{{ asset('js/app.js')}}"></script>

@endsection