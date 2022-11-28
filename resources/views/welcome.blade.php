<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudio DAG</title>

    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Dongle:wght@300&family=Roboto&display=swap');

body {
    
    
    margin: 0;
    background: linear-gradient(to left,hsla(234, 84%, 42%, 0.767), #0f63eb );
    
    
}

#login-row #login-column #login-box {
    margin-top: 20px;
    max-width: 550px;
    height: 360px;
    box-shadow: 2px 2px 2px 2px white;
    border-radius: 3px;
}



#btnEnter {
   bottom: 75px;
   margin-right: 200px;
   position: relative;

}

.logo {
  position: relative;
  left: 390px;  
  bottom: 110px;
  color: white;
}

#login-box {
    position: fixed;
    left: 105px;
    top: 150px;
    background-color: white;

}

#login {
    padding-top: 50px;
    font-size: 100px;
    color: rgb(116, 111, 111);
    text-shadow: 1px 1px 2px white, 0 0 0.5em white, 0 0 1em  #558ABB;
    padding-left: 800px;
    font-family: 'Bebas Neue', cursive;
    padding-bottom: 0px;
    margin-bottom: 0px; 
    z-index: 3;
}

.form-group {
    width: 300px;
    padding-left: 15px;
    color: white;
    font-size:x-large;
}



footer {
    text-align:center;
    position: absolute;
    margin-top: 400px;
    margin-left: 700px;
    font-size: x-large;
    font-weight: 700;
    color: white;
}

.container {
    min-height: 700px;
}

h2 {
    padding-left: 130px;
    letter-spacing: 2px;
    color:  white;
    font-weight: 300;
    font-size: 3cm;
    text-shadow: #ffffff69 10px 5px;
}


.form {
    color: white;
    background: linear-gradient(35deg, hwb(222 6% 33%), #0358c7);
    padding: 10px;
}

#btnEnter {
    color: 0358c7;
}

.text-dark {
    color: white;
}

h3 {
    color: #0358c7 ;
}

.form-group > label {
    color: #0358c7 ;
}
    </style>
                
</head>
    
<body>
<div class="" style="margin:20px 0px 0px 20px;font-size:25px">
    @if (Route::has('login'))
        <div class="">
            @auth
                <a href="{{ url('/home') }}" class="" style="color:white;text-decoration: none">Inicio</a>
            @else
                <a href="{{ route('login') }}" class="" style="color:white;text-decoration: none">Ingresar</a>

                <!-- @if (Route::has('register'))
                    <a href="{{ route('register') }}" style="color:white;text-decoration: none">Registrate</a>
                @endif -->
            @endauth
        </div>
    @endif

    
     
</div>            
            <div id="login">   
                    <h1 class="text-center" style="position:absolute; z-index:3;">Estudio DAG</h1>         
                    
                    </div>         
                        
             </div>               
        <footer class="">
                     <div class="">
                         <div class="copyright " id="footer">
                            <span>Copyright &copy; Arcich Silvio 2022</span>
                         </div>
                    </div>
        </footer>
            


            

            
</body>
</html>
