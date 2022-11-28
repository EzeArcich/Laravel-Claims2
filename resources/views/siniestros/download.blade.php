<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Document</title>
</head>
<style>
    .form-control .input-group-text {
        font-weight: 500;
    }
</style>
<body>

    <section class="section">
        
     
        <div class="section-body">
        
            <div class="row">
            

                                
                                <div class="col-lg-12">
                                 
                                <div class="card">
                                  
                                <div class="card-header pt-0 pb-0" style="min-height:40px">
                                <h3  class="mx-auto my-auto bg-secondary p-3" style="color:white">{{$siniestro->siniestro}} - {{$siniestro->compania}} - {{ $siniestro->fechaip }}</h3>
                                </div>
                                <div class="card-body">
                                
                                <div class="row">
                                
                                
                                    
                                      
                                        <div class="col-xs-4 col-sm-4 col-md-4 mt-5 float-right">
                                            <label class="sr-only" for="inlineFormInputGroup">Tipo de IP</label>
                                            
                                                <div class="input-group-text text-light bg-secondary">Tipo de IP</div>
                                              
                                              <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->modalidad }}">
                                            
                                          </div>
                                          <div class="col-xs-6 col-sm-6 col-md-6 mt-5">
                                            <label class="sr-only" for="inlineFormInputGroup">Rango horario</label>
                                            
                                                <div class="input-group-text text-light bg-secondary">Rango horario</div>
                                              
                                              <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->horario }}">
                                            
                                          </div>
                                      
                                      
                                      <div class="col-xs-4 col-sm-4 col-md-4 mt-5 float-right">
                                        <label class="sr-only" for="inlineFormInputGroup">Patente</label>
                                        
                                            <div class="input-group-text text-light bg-secondary">Patente</div>
                                          
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->patente }}">
                                        
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6 mt-5">
                                        <label class="sr-only" for="inlineFormInputGroup">Nombre del taller</label>
                                        
                                            <div class="input-group-text text-light bg-secondary">Nombre del taller</div>
                                          
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->nombretaller }}">
                                        
                                      </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4 mt-5 float-right">
                                        <label class="sr-only" for="inlineFormInputGroup">Motivo</label>
                                        
                                            <div class="input-group-text text-light bg-secondary">Motivo</div>
                                         
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->motivo }}">
                                        
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6 mt-5">
                                        <label class="sr-only" for="inlineFormInputGroup">Dirección</label>
                                        
                                            <div class="input-group-text text-light bg-secondary">Dirección</div>
                                          
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->direccion }}">
                                        
                                      </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4 mt-5 float-right">
                                        <label class="sr-only" for="inlineFormInputGroup">Enviar orden</label>
                                        
                                            <div class="input-group-text text-light bg-secondary">Enviar orden</div>
                                          
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->enviarorden }}">
                                        
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6 mt-5">
                                        <label class="sr-only" for="inlineFormInputGroup">Localidad</label>
                                        
                                            <div class="input-group-text text-light bg-secondary">Localidad</div>
                                          
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->localidad }}">
                                        
                                      </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4 mt-5 float-right">
                                        <label class="sr-only" for="inlineFormInputGroup">Cliente</label>
                                        
                                            <div class="input-group-text text-light bg-secondary">Cliente</div>
                                         
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->cliente }}">
                                        
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6 mt-5">
                                        <label class="sr-only" for="inlineFormInputGroup">E-mail</label>
                                        
                                            <div class="input-group-text text-light bg-secondary">E-mail</div>
                                          
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->email }}">
                                       
                                      </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4 mt-5 float-right">
                                        <label class="sr-only" for="inlineFormInputGroup">Coordinador</label>
                                        
                                            <div class="input-group-text text-light bg-secondary" >Coordinador</div>
                                         
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->coordinador }}">
                                        
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6 mt-5">
                                        <label class="sr-only" for="inlineFormInputGroup">Teléfono</label>
                                        
                                            <div class="input-group-text text-light bg-secondary" >Teléfono</div>
                                          
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->telefono }}">
                                        
                                      </div>
                                    
                                    
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-5">           
                                        <div class="input-group-text text-light bg-secondary">Observaciones</div>    
                                        <div class="form-floating">
                                        <textarea class="form-control" name="observaciones" style="height:80px" id="observaciones" value="{{ $siniestro->observaciones }}">{{ $siniestro->observaciones }}</textarea>
                                        </div>
                                    </div>
                               
                                    

                                      
                                  </div>
                                
                                


                                
                               
                                </div>
                                <br>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>




   
     


	

    
    






