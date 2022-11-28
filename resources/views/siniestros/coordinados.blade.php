@extends('layouts.app')




@section('content')

@php
$cant_th = $siniestros
    ->whereIn('modalidad', ['videollamada'])
    ->count();                                               
@endphp
@php
$cant_foto = $siniestros
    ->whereIn('modalidad', ['foto'])
    ->count();                                               
@endphp
@php
$cant_caba = $siniestros
    ->whereIn('modalidad', ['foto y presupuesto'])
    ->count();                                               
@endphp
@php
$cant_total = $siniestros
    ->count();                                               
@endphp


<style>
    .selected{
        background-color: #bdffff; font-weight: bold; color: black;
    }
</style>

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading position-relative">Inspecciones a derivar<span class="badge badge-info position-absolute top-0 start-100 translate-middle rounded-pill">{{$cant_total}}</span></h3>
                
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                    <div class="card-header" style="background:linear-gradient(132deg, rgba(2,0,36,1) 0%, rgba(9,51,121,1) 0%, rgba(0,176,255,1) 100%);">
                    <h3 style="color:white">Inspecciones para asignar</h3>
                    <div class="float-right">
                    
                    </div>
                    
                    </div>
                
                        
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            
                         <table class="table  mt-2 siniestros" id="siniestros">
                             <thead style="background:linear-gradient(132deg, rgba(2,0,36,1) 0%, rgba(9,51,121,1) 0%, rgba(0,176,255,1) 100%);">                                     
                                  
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Checkbox</th>
                                   <th style="color:#fff;">Siniestro</th>
                                  <th style="color:#fff;">Fecha IP</th>
                                  <th style="color:#fff;">Modalidad</th>
                                  <th style="color:#fff;">Patente</th>               
                                 <th style="color:#fff;">Domicilio</th>
                                  <th style="color:#fff;">Localidad</th>
                                  <th style="color:#fff;">Inspector</th>
                                                    
                                                                                                                        
                             </thead>
                             <tbody>
                                 @foreach ($siniestros as $siniestro)
                                 <tr>
                                       <td style="display: none;">{{ $siniestro->id }}</td>
                                       <td><input type="checkbox" onclick="selectedRow(),obtenerId({{$siniestro->id}})"></td>
                                      <td onclick="selectedRow(),obtenerId({{$siniestro->id}})">{{ $siniestro->siniestro }}</td>
                                      <td onclick="selectedRow(),obtenerId({{$siniestro->id}})">{{ $siniestro->fechaip }}</td>
                                      <td onclick="selectedRow(),obtenerId({{$siniestro->id}})">{{ $siniestro->modalidad }}</td>
                                      <td onclick="selectedRow(),obtenerId({{$siniestro->id}})">{{ $siniestro->patente }}</td>
                                      <td onclick="selectedRow(),obtenerId({{$siniestro->id}})">{{ $siniestro->direccion }}</td>
                                      <td onclick="selectedRow(),obtenerId({{$siniestro->id}})">
                                        @if( $siniestro->localidad  == 'CABA') 
                                        <span class="badge badge-pill badge-primary">{{ $siniestro->localidad }}</span>
                                        @endif
                                            </td>
                                     <td onclick="selectedRow(),obtenerId({{$siniestro->id}})">{{ $siniestro->inspector }}</td>



                                                        
                                  </tr>
                                  @endforeach
                              </tbody>
                         </table>
                                            
                                    
                         </div>          
                    </div>
                                    
                </div>

                
                <div class="col-sm-3" style=" bottom:506px; right:25px; position: fixed;">
                    <div class="card">
                    <div class="card-header" style="background:linear-gradient(132deg, rgba(2,0,36,1) 0%, rgba(9,51,121,1) 0%, rgba(0,176,255,1) 100%);">
                        <button class="btn btn-info ml-5 float-right position-relative">
                            TH <span class="badge badge-light position-absolute top-0 start-100 translate-middle rounded-pill">{{$cant_th}}</span>
                    </button>
                    <button class="btn btn-info ml-5 float-right position-relative">
                            Foto <span class="badge badge-light position-absolute top-0 start-100 translate-middle rounded-pill">{{$cant_foto}}</span>
                    </button>
                    <button class="btn btn-info ml-5 float-right position-relative">
                            Foto/Pres. <span class="badge badge-light position-absolute top-0 start-100 translate-middle rounded-pill">{{$cant_caba}}</span>
                    </button>
                    <h3 style="color:white"></h3>
                    <hr>
                    </div>
                    
                    
                        <hr>
                        <div class="row">
                                    
                                    <div class="col-xs-10 col-sm-10 col-md-10 mx-2">
                                        <label for="cliente">Cliente</label>
                                            <select class="form-select col-xs-12 col-sm-12 col-md-12"  aria-label="Default select example" id="inspector" for="cliente" name="cliente"">
                                                @foreach($users as $user)
                                                <option value="{{$user->name}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                   

                                    <div class="col-xs-5 col-sm-5 col-md-5" hidden="true" >
                                        <div class="form-group ml-2">
                                        <label class="ml-2" for="estado">Estado</label>
                                        <input type="text" name="estado" id="estado" class="form-control" value="Coordinado">
                                        </div>
                                    </div>

                                    <div class="col-xs-5 col-sm-5 col-md-5" hidden>
                                        <div class="form-group ml-2">
                                        <label class="ml-2" for="seleccionados">Id´s Seleccionados</label>
                                        <input type="text" name="seleccionados[]" id="seleccionados" class="form-control" multiple>
                                        
                                        </div>
                                    </div>

                                    </div>
                                   
                                
                                    
                                    </div>
                                    <input id="id" hidden="true">
                                <div>
                                
                                <button type="submit" class="btn btn-info btn-lg ml-5 mb-3" onclick="asignarPeritos(event)">Asignar perito</button>
                                <button type="submit" class="btn btn-success btn-lg ml-5 mb-3" onclick="updateDerivaciones(event)">Derivar inspecciones</button>
                                

                                
                                



                                </div>
                               
                                
                                </div>
                                <br>
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
	
    
    

@endsection


@section('javas')

   <script>
    
    $(document).ready(function() {
    $('.siniestros').DataTable({
        pageLength : 60,
        pagingType: "simple",
        lengthChange: false,
        responsive: true,
        processing: true,
        drawCallback: function() {
        $('.inspectoresSelect').select2();
        },
        
        "rowCallback": function( row, data, index ) {
          var allData = this.api().column(4).data().toArray();
          if (allData.indexOf(data[4]) != allData.lastIndexOf(data[4])) {
            $(row).css('background-color', '#E8DE3E');
          }
        }
 
    });
    })
    

</script>   


<script>
   function selectedRow(){
                
                var index,
                    table = document.getElementById("siniestros");
            
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
            $('#email').val(data.email);
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
            $('#inspector').val(data.name);
            $('#email').val(data.email);
            
           

            console.log(data);
        }
    })
}


 // --------------------------------------------- Update de registros a la table de BD -----------------------------------------------------




    function updateData(event){

   event.preventDefault();
    var id = $('#id').val();
    var siniestro =  $('#siniestro').val();
    var fechaip = $('#fechaip').val();
    var inspector = $('#inspector').val();
    var localidad = $('#localidad').val();
    var estado = $('#estado').val();
    var direccion = $('#direccion').val();
    var email = $('#email').val(); 
    var patente = $('#patente').val();
    $.ajaxSetup({
   headers:{
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
   })
 

    $.ajax({
        type: "PUT",
        dataType: "json",
        data: {inspector:inspector, fechaip:fechaip, estado:estado, patente:patente, siniestro:siniestro, localidad:localidad, direccion:direccion, email:email},
        url: "/teacher/update/"+id,
        success: function(response){
         setTimeout(reladData,1200);
         Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Siniestro asignado con éxito',
         })
         timer: 1500
        
           clearData();
         
        console.log('Siniestro asignado con éxito');
        }
     
    })


   }
// ---------------------------------------------------------------------------------------------------------------------------

function Correo(event){

event.preventDefault();
 
 $.ajaxSetup({
headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
})


 $.ajax({
     type: "POST",
     dataType: "json",
     data: {},
     url: "/correo",
     success: function(response){
      
      
     console.log('Siniestro asignado con éxito');
     }
  
 })


}

function CorreoEdu(event){

event.preventDefault();
// var id = $('#id').val();
var siniestro =  $('#siniestro').val();
var email = $('#email').val();
var fechaip = $('#fechaip').val();
var patente = $('#patente').val();
var nrocorto =  $('#nrocorto').val();
var comentariosparaip = $('#comentariosparaip').val();
var telefono = $('#telefono').val();
var localidad = $('#localidad').val();
var direccion =  $('#direccion').val();
var modalidad = $('#modalidad').val();
var lugar = $('#lugar').val();
var nombretaller = $('#nombretaller').val();
var motivo = $('#motivo').val();
var horario = $('#horario').val();
var cliente = $('#cliente').val();
var enviarorden = $('#enviarorden').val();




 
 $.ajaxSetup({
headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
})


 $.ajax({
     type: "POST",
     
     data: {siniestro:siniestro, email:email, fechaip:fechaip, patente:patente, nrocorto:nrocorto, comentariosparaip:comentariosparaip, telefono:telefono, localidad:localidad, direccion:direccion,
    modalidad:modalidad, lugar:lugar, nombretaller:nombretaller, motivo:motivo, horario:horario, enviarorden:enviarorden, cliente:cliente},
     url: "/correoEdu",
     success: function(response){
            
         Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Enviado a Edu con exito',
         })
         timer: 500;
       
        console.log('Correo enviado con exito');
        }
  
 })


}

// Update derivaciones

function updateDerivaciones(event){
event.preventDefault();
$.ajaxSetup({
headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
})

 $.ajax({
     type: "POST",   
     data: {},
     url: "/siniestros/updateDerivaciones",
     success: function(response){          
         Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Siniestros asignados a los periotos',
         })
         timer: 500;
        console.log('Siniestros asignados a los peritos');
        }
 })
}



function obtenerId(id)
{  
    var idsseleccionados = [$('#seleccionados').val()];
 $.ajax({
     type:"get",
     dataType:"json",
     url:"/teacher/edit/"+id,
     success: function(data){
            $('#seleccionados').val(idsseleccionados+data.id+',');
          idsseleccionados.push(data.id);
   
     }   
 })
 
}


function asignarPeritos(event){
event.preventDefault();
var inspector = $('#inspector').val();
var idsseleccionados = $('#seleccionados').val();
var seleccionados = idsseleccionados.split(",");


$.ajaxSetup({
headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
})

 $.ajax({
     type: "PUT",   
     data: {inspector:inspector, seleccionados:seleccionados},
     
     url: "/siniestros/asignarPeritos",
     success: function(response){          
          Swal.fire({
              icon: 'success',
              position: 'top-end',
              showConfirmButton: false,
              title: 'Peritos asignado a siniestros seleccionados',
          })
          timer: 500;
        console.log(seleccionados);
        }
 })
}

</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection

