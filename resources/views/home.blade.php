@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">
                                    
                                <div class="col-md-4 col-xl-4">
                                         <div class="card order-card  mb-1" style="background: linear-gradient(70deg, black, red);">
                                            <div class="card-block p-3">
                                            <h5>Pendientes</h5>                                               
                                                @php
                                                $cant_usuarios = DB::table('siniestros')
                                                    ->whereIn('estado', ['pendiente'])
                                                    ->count();                                               
                                                @endphp
                                                <h2 class="text-right" style="color:white"><i class="fa fa-clock f-left fa-xl mr-2"></i><span style="font-size:xl">{{$cant_usuarios}}</span></h2>
                                                
                                                <p class="m-b-0 text-right"><a href="/siniestros/pendientes" class="text-white">Ver más</a></p>
                                                
                                                </div> 
                                             </div> 
                                             </div>
                                             @can('derivar-siniestro')
                                    <div class="col-md-4 col-xl-4">
                                    <div class="card order-card" style="background: linear-gradient(70deg, black, yellow);">
                                            <div class="card-block p-3">
                                            <h5>Coordinados</h5>                                               
                                                @php
                                                $cant_usuarios = DB::table('siniestros')
                                                    ->whereIn('estado', ['coordinado'])
                                                    ->count();                                               
                                                @endphp
                                                <h2 class="text-right" style="color:white"><i class="fa fa-calendar-check f-left fa-xl mr-2"></i><span>{{$cant_usuarios}}</span></h2>
                                                
                                                <p class="m-b-0 text-right"><a href="/siniestros/derivaciones" class="text-white">Ver más</a></p>
                                                
                                            </div>                                            
                                        </div>                                    
                                    </div>
                                    @endcan

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card order-card" style="background: linear-gradient(70deg, black, green);">
                                            <div class="card-block p-3">
                                            <h5>IP Derivadas</h5>                                               
                                                @php
                                                $cant_roles = DB::table('siniestros')
                                                    ->whereIn('estado', ['Peritando'])
                                                    ->count();                                               
                                                @endphp
                                                <h2 class="text-right" style="color:white"><i class="fa fa-user-tie f-left fa-xl mr-2"></i><span>{{$cant_roles}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/siniestros" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>                                                                
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card order-card " style="background: linear-gradient(70deg, black, #0072BB);">
                                            <div class="card-block p-3">
                                                <h5>Ausentes</h5>                                               
                                                @php
                                                $cant_siniestros = DB::table('siniestros')
                                                    ->whereIn('estado', ['ausente'])
                                                    ->count();                                               
                                                @endphp
                                                <h2 class="text-right" style="color:white"><i class="fa fa-xl mr-2 fa-calendar-xmark f-left "></i><span>{{$cant_siniestros}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/siniestros/ausentes" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

