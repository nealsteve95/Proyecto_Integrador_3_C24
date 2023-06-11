@extends('partials/template')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500,300' rel='stylesheet' type='text/css'><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'><link rel="stylesheet"href="{{ asset('css/homeRecepcionista.css') }}">

@section('sidebar-list')
<li class="sidebar-list-item active">
    <a href="{{ route('recepcionista/home') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-home">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
            <polyline points="9 22 9 12 15 12 15 22" />
        </svg>
        <span>Home</span>
    </a>
</li>
<li class="sidebar-list-item ">
    <a href="{{ route('recepcionista/huespedes') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-shopping-bag">
            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <path d="M16 10a4 4 0 0 1-8 0" />
        </svg>
        <span>Huespedes</span>
    </a>
</li>
 <li class="sidebar-list-item ">
    <a href="{{ route('recepcionista/habitaciones') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-pie-chart">
            <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />
            <path d="M22 12A10 10 0 0 0 12 2v10z" />
        </svg>
        <span>Habitaciones</span>
    </a>
</li>
{{--<li class="sidebar-list-item ">
  <a href="{{ route('recepcionista/reservas') }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round" class="feather feather-pie-chart">
          <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />
          <path d="M22 12A10 10 0 0 0 12 2v10z" />
      </svg>
      <span>reservas</span>
  </a>
</li>
<li class="sidebar-list-item ">
  <a href="{{ route('recepcionista/habitaciones') }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round" class="feather feather-pie-chart">
          <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />
          <path d="M22 12A10 10 0 0 0 12 2v10z" />
      </svg>
      <span>check in/out</span>
  </a>
</li>
<li class="sidebar-list-item ">
  <a href="{{ route('recepcionista/reportes') }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round" class="feather feather-pie-chart">
          <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />
          <path d="M22 12A10 10 0 0 0 12 2v10z" />
      </svg>
      <span>reportes</span>
  </a>
</li>
<li class="sidebar-list-item ">
  <a href="{{ route('recepcionista/cochera') }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round" class="feather feather-pie-chart">
          <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />
          <path d="M22 12A10 10 0 0 0 12 2v10z" />
      </svg>
      <span>cochera</span>
  </a>
</li> --}}


@endsection
@section('app-content')
    @section('title')
        home - bienvenido recepcionista.
    @endsection
    @section('app-content')
        {{-- Información de dashboard --}}

    
    {{-- 1. -info representado en cartas:_:: --}}
    <div class="container-fluid scrollable-content">
        
    {{-- 2. imagen referente a hotel --}}
        <!-- partial:index.partial.html -->
          <div id="my-slider" class="grid-container">
            <div id="my-slider-inner" class="grid-item">
              <img src="https://picsum.photos/570/270/?random&1" alt="Slide 1" />
              <img src="https://picsum.photos/570/270/?random&2" alt="Slide 2" /> 
              <img src="https://picsum.photos/570/270/?random&3" alt="Slide 3" />
              <img src="https://picsum.photos/570/270/?random&4" alt="Slide 4" /> 
              <img src="https://picsum.photos/570/270/?random&5" alt="Slide 5" /> 
              <img src="https://picsum.photos/570/270/?random&6" alt="Slide 6" /> 
              <img src="https://picsum.photos/570/270/?random&7" alt="Slide 7" />
            </div>
            <div id="my-slider-inner" class="grid-item">
              <img src="https://picsum.photos/570/270/?random&1" alt="Slide 1" />
              <img src="https://picsum.photos/570/270/?random&2" alt="Slide 2" /> 
              <img src="https://picsum.photos/570/270/?random&3" alt="Slide 3" />
              <img src="https://picsum.photos/570/270/?random&4" alt="Slide 4" /> 
              <img src="https://picsum.photos/570/270/?random&5" alt="Slide 5" /> 
              <img src="https://picsum.photos/570/270/?random&6" alt="Slide 6" /> 
              <img src="https://picsum.photos/570/270/?random&7" alt="Slide 7" />
            </div>
          </div>
        <!-- partial -->
        <script src="{{ asset('js/imagenes.js') }}"></script>
    {{-- ----------------------------------------------------------------------------------- --}}
        <ul>
          <li>
            <div class="card card-green col-md-12">
              <p class="card-question">Early Check in: 6 a 12 Pm Late Check out: Hasta 08:00 Pm</p>
              <div class="card-separator"></div>
            </div>
          </li>
        
          <li>
            <div class="card card-green col-md-12">
              <p class="card-question">Se debe solicitar los datos de los clientes, los cuales son:</p>
              <div class="card-separator"></div>
              <p class="card-fonter" style="text-align:center;">1. Nombre completo </p>
              <div class="card-separator"></div>
              <div class="card-separator"></div>
              <p class="card-fonter" style="text-align:center;">2. N° de DNIT</p>
              <div class="card-separator"></div>
              <div class="card-separator"></div>
              <p class="card-fonter" style="text-align:center;">3. cantidad de personas que ingresaran a la habitación </p>
              <div class="card-separator"></div>
              <div class="card-separator"></div>
              <p class="card-fonter" style="text-align:center;">4.Hora aproximada de ingreso</p>
              <div class="card-separator"></div>
              <div class="card-separator"></div>
              <p class="card-fonter" style="text-align:center;">5. indicar si necesitara la reserva de un espacio en la cochera"</p>
              <div class="card-separator"></div>
            </div>
          </li>

          <li>
            <div class="card card-blue  col-md-12">
              <p class="card-question">NO OLVIDAR: MODIFICAR DISPONIBILIDAD EN BOOKING CUANDO SE CONFIRMEN RESERVAS POR LLAMADA, CORREO O WHATSAPP</p>
              <div class="card-separator"></div>
            </div>
          </li>
          
          <li>
            <div class="card card-blue  col-md-12">
              <p class="card-question">NO OLVIDAR: NO RECIBIR PERSONAS EN COMPLETO ESTADO ETILICO.</p>
              <div class="card-separator"></div>
            </div>
          </li>
        
          <li>
            <div class="card card-red col-md-12">
              <p class="card-question">IMPORTANTE!: NO VENDER HABITACIONES DOBLES (206 Y 301) A MENOS DE S/180.00</p>
              <div class="card-separator"></div>
              <p class="card-fonter" style="text-align:center;">se debe indicar al huesped que no debe utilizar ni colocar cosas sobre la cama de 11/2 plzs, de lo contrario se le cobrara la tarifa completa</p>
              <div class="card-separator"></div>
            </div>
          </li>

          <li>
            <div class="card card-red col-md-12">
              <p class="card-question">MPORTANTE!: VERIFICAR QUE LAS HABITACIONES CUMPLAN CON LOS ESTANDARES DE CALIDAD.</p>
              <div class="card-separator"></div>
            </div>
          </li>


        </ul>
    </div>
    {{-- ----------------------------------------------------------------------------------- --}}
    {{-- 3. informacion adicional suelta o cualquier cosa xddd --}}

    {{-- ----------------------------------------------------------------------------------- --}}
    @endsection
@endsection
