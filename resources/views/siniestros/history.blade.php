@extends('layouts.app')


@section('content')
 



    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Historial de cambios</h3>
        </div>
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://siniestrosdag.com/home#">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="https://siniestrosdag.com/siniestros">Siniestros</a></li>
    <!-- <li class="breadcrumb-item active" aria-current="page">Index</li> -->
  </ol>
</nav>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body" style="overflow-y: scroll; max-height:50rem;">

                            
                            @php

                            
                
                            foreach($entradas as $entrada)
                            {
                            if($entrada->auditable_id == $siniestro->id && $entrada->new_values == '') {
                                echo "<div class='card bg-light mb-3' style='max-width: 35rem'>
                                <div class='card-header'>Fecha: {$entrada->created_at}</div>
                                
                                <blockquote class='blockquote mb-0'>
                                    <h5 class='card-title'>Comentario: {$entrada->event}</h5>
                                    <p>{$entrada->body}</p>
                                    <footer class='blockquote-footer'>  <cite title='Source Title'>by {$entrada->name}</cite></footer>
                                  </blockquote>
                              </div>
                              <hr>";
                            } elseif ($entrada->auditable_id == $siniestro->id && $entrada->new_values != '') {
                                echo "<div class='card bg-light mb-3' style='max-width: 35rem'>
                                <div class='card-header'>Fecha: {$entrada->created_at} - Evento: {$entrada->event}</div>
                                
                                
                                    
                                  <div class='card-body' style='background-color:white;'>
                                    <p> Valores: {$entrada->new_values}</p>
                                    <footer class='blockquote-footer'> <cite title='Source Title'>by {$entrada->name}</cite></footer>
                                  </div>
                              </div>
                              <hr>";
                            }
                        }
                              @endphp

                        

                        
                       
                        
                        </div>
                        
                        <div class="card-body">
                            <div class="form-group mt-5">
                                <textarea name="body" id="body" style="width: 35rem;" rows="5" placeholder=" Ingrese comentario aqui"></textarea>
                            </div>
    
                            <div class="form-group mt-5" >
                                <input type="text" id="user_id" name="user_id" value="{{ Auth::user()->id }}" hidden>
                            </div>
    
                            <div class="form-group mt-5" >
                                <input type="text" id="auditable_id" name="auditable_id" value="{{ $siniestro->id }}" hidden>
                            </div>
    
                            <div class="form-group">
                                
                                <button  class="btn btn-info btn-lg " onclick='addData()'>Agregar comentario</button>
    
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    
@endsection
@section('javas')   
<script>

function addComentario(event){

event.preventDefault();

var body =  $('#body').val();
var user_id = $('#user_id').val();
var auditable_id = $('#auditable_id').val();
 
 $.ajaxSetup({
headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
})

 $.ajax({
     type: "POST",
     data: {body:body, user_id:user_id, auditable_id:auditable_id},
     url: "audits.store",
     success: function(response){    
         
         
        console.log('Comentario ingresado con éxito');
        }
 })
}





function addData() {
            var body =  $('#body').val();
            var user_id = $('#user_id').val();
            var auditable_id = $('#auditable_id').val();

            $.ajaxSetup({
headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
})
            
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    body: body,
                    user_id: user_id,
                    auditable_id: auditable_id
                },
                url: "{{route('audits.store')}}",
                success: function(response) {
                    
                    // end alert
                },
                // start error
               
                // end error
            });
        }
    
    
</script> 
    
    
   

    
@endsection