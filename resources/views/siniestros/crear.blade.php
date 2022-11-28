@extends('layouts.app')

@section('css')

<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

@endsection




@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ingresar siniestro</h3>
        </div>
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://siniestrosdag.com/home#">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="https://siniestrosdag.com/siniestros">Siniestros</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear siniestros</li> 
  </ol>
</nav>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-9">
                    <div class="card">
                    <div class="card-header" style="background:linear-gradient(132deg, rgba(2,0,36,1) 0%, rgba(9,51,121,1) 0%, rgba(0,176,255,1) 100%);">
                                <h3 class="mx-auto my-auto" style="color:white">Ingreso de siniestro</h3>
                                </div>
                        <div class="card-body">     
                                                                      
                            

                            <form action="{{ route('siniestros.store') }}" method="POST" id="myForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <div class="row border border-dark rounded p-2 m-3" style="border-width: 5px!important">
                                  <div class="col-xs-6 col-sm-6 col-md-6 mt-4">
                                    <label class="sr-only" for="inlineFormInputGroup">PAS</label>
                                    <div class="input-group mb-2">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text bg-secondary">PAS</div>
                                      </div>
                                      <input type="text" name="pas" class="form-control" id="pas">
                                      <span class="input-group-btn">
                                        <button class="btn btn-info pull-right" type="button" data-toggle="modal" href="#" data-target="#modal_productores" ><span class="fa fa-search-plus fa-xl pt-3" style="height: 1.2rem;"  aria-hidden="true"></span></button>
                                   </span>	
                                    </div>
                                    </div>   
                                    <div class="col-xs-6 col-sm-6 col-md-6 mt-4">
                                        <label class="sr-only" for="inlineFormInputGroup">Email del PAS</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">Email del PAS</div>
                                          </div>
                                          <input type="text" name="correo" class="form-control" id="emailPas">
                                        </div>
                                    </div>
                                    <div class="col-xs-5 col-sm-5 col-md-5">
                                        <label class="sr-only" for="inlineFormInputGroup">En copia</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">En copia</div>
                                          </div>
                                          <input type="text" name="cc" class="form-control" id="cc">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <label class="sr-only" for="inlineFormInputGroup">2do en copia</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">2do en copia</div>
                                          </div>
                                          <input type="text" name="cc2" class="form-control" id="cc2">
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <div class="form-group">
                                        <button type="submit" class="btn btn-info btn-lg ml-5" onclick="Correo(event)">Contacto vía mail</button>
                                        </div>
                                        </div>
                                </div>  
                                
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label class="sr-only" for="inlineFormInputGroup">Compañía</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">Compañía</div>
                                            <select class="form-select col-xs-12 col-sm-12 col-md-12" aria-label="Default select example" id="compania" for="compania" name="compania">
                                              <option selected>-- Seleccionar companía --</option>
                                              <option value="Mercantil Andina">Mercantil Andina</option>
                                              <option value="Agrosalta">Agrosalta</option>
                                              <option value="Provincia seguros">Provincia seguros</option>
                                              <option value="Meridional">Meridional</option>
                                          </select>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label class="sr-only" for="inlineFormInputGroup">Siniestro</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">Siniestro</div>
                                              </div>
                                              <input type="text" name="siniestro" class="form-control" id="siniestro">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label class="sr-only" for="inlineFormInputGroup">Fecha ip</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">Fecha ip</div>
                                              </div>
                                              <input type="date" name="fechaip" class="form-control" id="fechaip">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                          <label class="sr-only" for="inlineFormInputGroup">Modalidad</label>
                                          <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                              <div class="input-group-text bg-secondary">Modalidad</div>
                                              <select class="form-select col-xs-12 col-sm-12 col-md-12" style="width:22.2rem" aria-label="Default select example" id="modalidad" for="modalidad" name="modalidad">
                                                  <option selected>-- Seleccionar modalidad --</option>
                                                  <option value="Presencial">Presencial</option>
                                                  <option value="Videollamada">Videollamada</option>
                                                  <option value="X FOTO">X FOTO</option>
                                                  <option value="X FOTO Y PRESUPUESTO">X FOTO Y PRESUPUESTO</option>
                                              </select>
                                            </div> 
                                          </div>
                                      </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label class="sr-only" for="inlineFormInputGroup">Horario</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">Horario</div>
                                              </div>
                                              <input type="text" name="horario" class="form-control" id="horario">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label class="sr-only" for="inlineFormInputGroup">Patente</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">Patente</div>
                                              </div>
                                              <input type="text" name="patente" class="form-control" id="patente">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label class="sr-only" for="inlineFormInputGroup">Nombre taller</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">Nombre taller</div>
                                              </div>
                                              <input type="text" name="nombretaller" class="form-control" id="nombretaller">
                                              <span class="input-group-btn">
                                                <button class="btn btn-info pull-right" type="button" data-toggle="modal" href="#" data-target="#modal_talleres" ><span class="fa fa-search-plus fa-xl pt-3"  aria-hidden="true"></span></button>
                                           </span>	
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label class="sr-only" for="inlineFormInputGroup">Tipo de ip</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">Tipo de ip</div>
                                                <select class="form-select col-xs-12 col-sm-12 col-md-12" style="width:22.8rem"  aria-label="Default select example" id="motivo" for="motivo" name="motivo"">
                                                    <option selected>-- Seleccionar tipo de IP --</option>
                                                    <option value="IP">IP</option>
                                                    <option value="AMPL">AMPL</option>
                                                    <option value="DT">DT</option>
                                                    <option value="ACT VALORES">ACT VALORES</option>
                                                    <option value="FINAL">FINAL</option>
                                                    
                                                </select>
                                              </div> 
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label class="sr-only" for="inlineFormInputGroup">Dirección</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">Dirección</div>
                                              </div>
                                              <input type="text" name="direccion" class="form-control" id="direccion">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                          <label class="sr-only" for="inlineFormInputGroup">Enviar orden</label>
                                          <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                              <div class="input-group-text bg-secondary">Enviar orden</div>
                                              <select class="form-select col-xs-12 col-sm-12 col-md-12" style="width:20.7rem" aria-label="Default select example" id="enviarorden" for="enviarorden" name="enviarorden"">
                                                  <option selected>-- Seleccionar --</option>
                                                  <option value="SI">SI</option>
                                                  <option value="NO">NO</option>
                                              </select>
                                            </div> 
                                          </div>
                                      </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label class="sr-only" for="inlineFormInputGroup">Localidad</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">Localidad</div>
                                              </div>
                                              <input type="text" name="localidad" class="form-control" id="localidad">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                          <label class="sr-only" for="inlineFormInputGroup">Cliente</label>
                                          <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                              <div class="input-group-text bg-secondary">Cliente</div>
                                              <select class="form-select col-xs-12 col-sm-12 col-md-12" style="width:25rem" aria-label="Default select example" id="cliente" for="cliente" name="cliente"">
                                                  <option selected>-- Seleccionar --</option>
                                                  <option value="Asegurado">Asegurado</option>
                                                  <option value="Tercero">Tercero</option>
                                                  <option value="Mediación">Mediación</option>
                                                  <option value="Negociacion">Negociacion</option>
                                              </select>
                                            </div> 
                                          </div>
                                      </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label class="sr-only" for="inlineFormInputGroup">E-mail</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">E-mail</div>
                                              </div>
                                              <input type="text" name="email" class="form-control" id="email">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label class="sr-only" for="inlineFormInputGroup">Link 2.0</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">Link 2.0</div>
                                              </div>
                                              <input type="text" name="link" class="form-control" id="link">
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label class="sr-only" for="inlineFormInputGroup">TE de contacto</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">TE de contacto</div>
                                              </div>
                                              <input type="text" name="telefono" class="form-control" id="telefono">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label class="sr-only" for="file">Adjuntos</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">Adjuntos</div>
                                              </div>
                                              <input type="file" name="urls[]" class="form-control" id="file" multiple required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-12 col-md-12">           
                                            <div class="input-group-text bg-secondary">Observaciones</div>    
                                            <div class="form-floating">
                                            <textarea class="form-control" name="observaciones" style="height:100px" id="observaciones"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-sm-6 col-md-6 mt-2">
                                            <label class="sr-only" for="inlineFormInputGroup">Contacto para negociar</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">Contacto para negociar</div>
                                              </div>
                                              <input type="text" name="contacto" class="form-control" id="contacto">
                                            </div>
                                        </div>

                                        <div class="col 6"></div>

                                        <div class="col-xs-6 col-sm-6 col-md-6 mt-2">
                                            <label class="sr-only" for="inlineFormInputGroup">Estado</label>
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">Estado</div>
                                                <input type="text" name="estado" id="estado" value="" hidden>
                                              </div>
                                                <button onclick="$('#estado').val('Pendiente'); estPendiente()" class="btn btn-success btn-lg ml-1 mb-3">Ingreso</button>
                                                <button onclick="$('#estado').val('Coordinado'); estCoordinado()" type="submit" class="btn btn-primary btn-lg ml-1 mb-3">Coordinado</button>
                                                <button onclick="$('#estado').val('Egreso'); estEgreso()" type="submit" class="btn btn-warning btn-lg ml-1 mb-3">Egreso</button>
                                                <button onclick="$('#estado').val('Baja'); estBaja()" type="submit" class="btn btn-danger btn-lg ml-1 mb-3">Baja</button>
                                            </div>
                                        </div>


                                    

                                     <div class="col-xs-3 col-sm-3 col-md-3 DatCord" hidden="true">
                                        <div class="form-group">
                                        <label for="coordinador">Coordinador</label>
                                        <input type="text" name="coordinador"  class="form-control" id="coordinador" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                        </div>
                                    </div>

                                    
                                    <div class="form-group mt-5" hidden>
                                      <input type="text" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                                  </div>

                                   
                                   
                                    
                                    
                                        <input id="id" hidden="true" value="{{ $siniestro->id }}">
                                </div>
                                </div>
                                
                                </div>
                                
                                </div>
                                
                                                


                                    
                                    
                                    </div>
                                
                                </div>
                            </form>
                        </div>   
                    </div>    
                </div>
            </div>
        </div>
    </section>
<!-- Ventana Modal PERITOS   -->

<style>
    .selected{
        background-color: #3abaf4; font-weight: bold; color: black;
    }
</style>
	<div class="modal fade" id="modal_productores" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header" style="background-color:hsl(213, 99%, 49%);padding-top:5px;">
            <h4 class="modal-title" style="color:white;">Productores</h4>  
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              
            </div>      
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">  
                    <div style="width: 100%; padding-left: -10px;">    
		            <div class="table-responsive">        
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                           
                                                
                                                        
                                                    <table class="table mt-2 productores" id="productores" cellspacing="0" width="100%">
                                                        <thead style="background-color:hsl(213, 99%, 49%)">                                     
                                                            <th style="display: none;color:#fff;font-size:20px">ID</th>
                                                            <th style="color:#fff;font-size:17px">Productor</th>
                                                            <th style="color:#fff;font-size:17px">Telefono</th>
                                                            <th style="color:#fff;font-size:17px">E-mail</th>
                                                            
                                                                                                                                
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($productores as $productor)
                                                            <tr>
                                                                <td style="display: none;">{{ $productor->id }}</td>
                                                                <td onclick="selectedRow(),productorData('{{ $productor->id }}')">{{ $productor->nombre }}</td>
                                                                <td onclick="selectedRow(),productorData('{{ $productor->id }}')">{{ $productor->telefono }}</td>
                                                                <td onclick="selectedRow(),productorData('{{ $productor->id }}')">{{ $productor->correo }}</td>

                                                                
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                        </div>
                    </div>
                    </div>
                    </div>
                </div>	
                <button type="button" class="btn btn-primary" data-dismiss="modal">Confirmar</button>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#Pasmodal"><i class="fa-regular fa-square-plus fa-lg"></i> Agregar</button>						
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>


      {{-- Modal para agregar PAS --}}
      <div class="modal fade" id="Pasmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Agregar productor</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <label class="sr-only" for="inlineFormInputGroup">Productor</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text bg-secondary">Productor</div>
                  </div>
                  <input type="text" name="nombre" class="form-control" id="nombre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <label class="sr-only" for="inlineFormInputGroup">Teléfono</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text bg-secondary">Teléfono</div>
                </div>
                <input type="text" name="phone" class="form-control" id="phone">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <label class="sr-only" for="inlineFormInputGroup">E-mail</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text bg-secondary">E-mail</div>
              </div>
              <input type="text" name="correo" class="form-control" id="correo" >
            </div>
        </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>


      {{-- Modal para agregar PAS - Fin --}}


      <div class="modal fade" id="modal_talleres" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="background-color:hsl(213, 99%, 49%);padding-top:5px;">
            <h4 class="modal-title" style="color:white;">Buscar perito</h4>  
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              
            </div>      
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">  
                    <div style="width: 100%; padding-left: -10px;">    
		            <div class="table-responsive">        
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                            <label for="">Talleres homologados</label>
                                                
                                                        
                                                    <table class="table mt-2 talleres" id="talleres" cellspacing="0" width="100%">
                                                        <thead style="background-color:hsl(213, 99%, 49%)">                                     
                                                            <th style="display: none;font-size:20px">ID</th>
                                                            <th style="color:#fff;font-size:17px">Taller</th>
                                                            <th style="color:#fff;font-size:17px">Localidad</th>
                                                            <th style="color:#fff;font-size:17px">Domicilio</th>
                                                            
                                                                                                                                
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($talleres as $taller)
                                                            <tr>
                                                                <td style="display: none;">{{ $taller->id }}</td>
                                                                <td onclick="selectedRow3(),tallerData('{{ $taller->id }}')">{{ $taller->taller }}</td>
                                                                <td onclick="selectedRow3(),tallerData('{{ $taller->id }}')">{{ $taller->localidad }}</td>
                                                                <td onclick="selectedRow3(),tallerData('{{ $taller->id }}')">{{ $taller->direccion }}</td>

                                                                
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                        </div>
                    </div>
                    </div>
                    </div>
                </div>	
                <button type="button" class="btn btn-primary" data-dismiss="modal">Confirmar</button>							
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    

@endsection



@section('javas')


   <script>

$(document).ready(function(){
    $('#patente').blur(function(){
        var error_patente = '';
        var patente = $('#patente').val();
        var _token =  $('meta[name="csrf-token"]').attr('content');
        
        
      
   
  
  
   $.ajax({
    url:"{{ route('siniestros.check') }}",
    method:"POST",
    data:{patente:patente, _token:_token},
    success:function(result)
    {
     if(result == 'unique')
     {
      $('#error_patente').html('<label class="card">Primer siniestro con esta patente</label>');
      $('#patente').removeClass('has-error');
      $('#register').attr('disabled', false);
      
     }
     else
     {
      $('#error_patente').html('<label class="card">Ya hay otro siniestro con esta patente</label>');
      $('#patente').addClass('has-error');
      $('#register').attr('disabled', 'disabled');
      
     }
    }
   })
  
 });
 
});


    
    $(document).ready(function() {
    $('.productores').DataTable({
        pageLength : 15,
        pagingType: "simple",
        lengthChange: false,
        responsive: true,
        processing: true,
        
    
        
    });
    })
    

</script>   

<script>
    
    $(document).ready(function() {
    $('.talleres').DataTable({
        pageLength : 10,
        pagingType: "simple",
        lengthChange: false,
        responsive: true,
        processing: true,

        
    });
})

</script>  

<script>





   function selectedRow(){
                
                var index,
                    table = document.getElementById("productores");
            
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         
                        {
                            $(this).addClass('selected').siblings().removeClass('selected')
                        }
                    };
                }
                
            }
            selectedRow();

            function selectedRow2(){
                
                var index,
                    table = document.getElementById("inspectores");
            
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         
                        {
                            $(this).addClass('selected').siblings().removeClass('selected')
                        }
                    };
                }
                
            }
            selectedRow2();

            function selectedRow3(){
                
                var index,
                    table = document.getElementById("talleres");
            
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         
                        {
                            $(this).addClass('selected').siblings().removeClass('selected')
                        }
                    };
                }
                
            }
            selectedRow3();




function clearData(){
 $('#siniestro').val('');
 $('#fechaip').val('');
 $('#inspector').val('');
 $('#localidad').val('');
 $('#direccion').val('');
 $('#email').val('');
 $('#nameError').text('');
 $('#titleError').text('');
 $('#instituteError').text('');
}

function reladData(){
    setTimeout(function() {
   location.reload();
   }); 
}

function goTo() {
    let link = "http://127.0.0.1:8000/siniestros/pendientes";
    window.location.replace(link);
};

function addData(event){

  event.preventDefault();
    
    var link = $('#link').val();
    var siniestro =  $('#siniestro').val();
    var patente = $('#patente').val();
    var nrocorto = $('#nrocorto').val();
    var cliente = $('#cliente').val();
    var modalidad = $('#modalidad').val(); 
    var motivo = $('#motivo').val();
    var correo = $('#correo').val();
    var observaciones = $('#observaciones').val();
    var email = $('#email').val();
    var nombretaller = $('#nombretaller').val();
    var telefonos = $('#telefono').val();
    var direccion = $('#direccion').val();
    var localidad = $('#localidad').val();
    var estado = $('#estado').val();
    var fechaip = $('#fechaip').val();
    var enviarorden = $('#enviarorden').val();
    var horario = $('#horario').val();
    var comentariosparaip = $('#comentariosparaip').val();
    var compania = $('#compania').val();
    var contacto = $('#contacto').val();
    var coordinador = $('#coordinador').val();
    var file = $('#file').val();

    $.ajaxSetup({
   headers:{
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
   })

    $.ajax({
        type: "POST",
        dataType: "Json",
        data: {modalidad:modalidad, motivo:motivo, fechaip:fechaip, patente:patente, siniestro:siniestro, localidad:localidad, direccion:direccion, email:email, estado:estado,
        observaciones:observaciones, nombretaller:nombretaller, telefono:telefonos, localidad:localidad, enviarorden:enviarorden, horario:horario, comentariosparaip:comentariosparaip, link:link,
        nrocorto:nrocorto, cliente:cliente, compania:compania, contacto:contacto, coordinador:coordinador},
        url:"/teacher/store/",
        success: function(data){
            Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Siniestro ingresado con éxito',
         });
            setTimeout(goTo,2500);
            
            
            
        },
        


        
    })

}




    function editData(id){
    



 
    $.ajax({
        type:"get",
        dataType:"json",
        url:"/teacher/edit/"+id,
        success: function(data){
            $('#id').val(data.id);
            $('#siniestro').val(data.siniestro);
            $('#fechaip').val(data.fechaip);
            $('#patente').val(data.patente);
            $('#direccion').val(data.direccion);
            $('#localidad').val(data.localidad);
            console.log(data);
        }
    })
}

function userData(id){
    



 
    $.ajax({
        type:"get",
        dataType:"json",
        url:"/teacher/users/"+id,
        success: function(data){
           

            // $('#id_inspector').val(data.id);
            $('.name').val(data.name);
            $('#email').val(data.email);
            
           

            console.log(data);
        }
    })
}

function productorData(id){
    



 
    $.ajax({
        type:"get",
        dataType:"json",
        url:"/teacher/productores/"+id,
        success: function(data){
           

            // $('#id_inspector').val(data.id);
            $('#pas').val(data.nombre);
            $('#emailPas').val(data.correo);
            $('#contacto').val(data.correo);
            
           

            console.log(data);
        }
    })
}

function tallerData(id){
    



 
    $.ajax({
        type:"get",
        dataType:"json",
        url:"/teacher/taller/"+id,
        success: function(data){
           

            // $('#id_inspector').val(data.id);
            $('#nombretaller').val(data.taller);
            $('#telefono').val(data.telefonos);
            $('#email').val(data.email);
            $('#direccion').val(data.direccion);
            $('#localidad').val(data.localidad);
            $('#modalidad').val('Videollamada');
            
            
           

            console.log(data);
        }
    })
}


 // --------------------------------------------- Update de registros a la table de BD -----------------------------------------------------

// <-------------------------------------- Para enviar correo ---------------------------------------------------------------------------------->

function Correo(event){

event.preventDefault();
// var id = $('#id').val();
var siniestro =  $('#siniestro').val();
var emailPas = $('#emailPas').val();
var coordinador = $('#coordinador').val();
var patente = $('#patente').val();
var cc = $('#cc').val();
var cc2 = $('#cc2').val();

 
 $.ajaxSetup({
headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
})


 $.ajax({
     type: "POST",
     
     data: {siniestro:siniestro, emailPas:emailPas, patente:patente, coordinador:coordinador, cc:cc, cc2:cc2},
     url: "/correo",
     success: function(response){
            
         Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Correo enviado con éxito',
         })
         timer: 500;
        
           
         
        console.log('Correo enviado con éxito');
        }
  
 })


}

function aSubmit(){
  document.getElementById("myForm").submit();
}

function estPendiente(){
  event.preventDefault();
  Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Siniestro ingresado, pendiendo para coordinación',
         });
  setTimeout(aSubmit, 2500);
}



 function estCoordinado(){
   event.preventDefault();
   Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Siniestro coordinado con éxito',
         });
  setTimeout(aSubmit, 2500);
   
  
 }

function estEgreso(){
  event.preventDefault();
  Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Siniestro enviado a egreso con éxito',
         });
  setTimeout(aSubmit, 2500);
}

function estBaja(){
  event.preventDefault();
  Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Siniestro dado de baja; recordar dar de baja la solicitud por 2.0',
         });
  setTimeout(aSubmit, 2500);
}






 


</script>
@endsection