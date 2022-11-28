<li class="side-menus  {{ Request::is('*') ? 'active' : '' }}">
    
        <a class="nav-link" href="/home">
            <i class=" fas fa-table fa-xl"></i><span class="ml-2" style="font-size:16px">Dashboard</span>
        </a>

        @can('ver-usuario')
        <a class="nav-link" href="/usuarios">
            <i class=" fas fa-users fa-xl"></i><span class="ml-2" style="font-size:16px">Usuarios</span>
        </a>
        @endcan
        @can('ver-rol')
        <a class="nav-link" href="/roles">
            <i class=" fas fa-user-lock fa-xl"></i><span class="ml-2" style="font-size:16px">Roles</span>
        </a>
        @endcan

        <a class=" nav-link" href="/talleres">
            <i class="fa-solid fa-house-circle-check fa-xl"></i><span class="ml-2" style="font-size:16px">TH</span>
        </a>

        {{-- Vista para administrativos --}}
        
        @can('ver-administrativos')
        <a class=" nav-link" href="/siniestros">
            <i class=" fas fa-solid fa-globe fa-xl"></i><span class="ml-2" style="font-size:16px">Global</span>
        </a>
        
        <div class="item">
            <a href="/siniestros/pendientes" class="sub-btn sub-item"><i class="fa-regular fa-square-plus fa-xl"></i>Ingreso</a>    
        </div>

        <a class="nav-link" href="/siniestros/coordinados">
            <i class=" fas fa-calendar-check fa-xl"></i><span style="font-size:16px">Coordinados</span>
        </a>

        <a class=" nav-link" href="/siniestros/peritosa">
            <i class="fa-solid fa-user-secret fa-xl"></i></i><span style="font-size:16px">Perito</span>
        </a>

        <a class=" nav-link" href="/siniestros/gestion">
            <i class="fa-solid fa-square-poll-vertical fa-xl mr-2"></i><span style="font-size:16px">Gestión</span>
        </a>

        <a class=" nav-link" href="#">
            <i class="fa-solid fa-right-from-bracket"></i><span style="font-size:16px">Egreso</span>
        </a>
        @endcan

        {{-- Fin vista para administrativos --}}



        @can('inspecciones-siniestro')
        <a class=" nav-link" href="/siniestros/peritos">
            <i class="fa-solid fa-list-check fa-xl"></i><span style="font-size:16px">Inspecciones</span>
        </a>
        @endcan
                
        
        
        
            
        </div>

       
        

 

       

        

    
        

</li>




