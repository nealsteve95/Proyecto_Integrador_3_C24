{{-- Inicio del sidebar --}}
@extends('partials/template')
@section('sidebar-list')
{{-- a la opción del sidebar activa (visitada) añadir clase 'active' --}}
<li class="sidebar-list-item">
    <a href="{{ route('administrador/home') }}">
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
    <a href="{{ route('administrador/huespedes') }}">
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
    <a href="{{ route('administrador/habitaciones') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-pie-chart">
            <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />
            <path d="M22 12A10 10 0 0 0 12 2v10z" />
        </svg>
        <span>Habitaciones</span>
    </a>
</li>
<li class="sidebar-list-item  active">
    <a href="{{ route('administrador/reservas') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-bell">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
            <path d="M13.73 21a2 2 0 0 1-3.46 0" />
        </svg>
        <span>Reservas</span>
    </a>
</li>
<li class="sidebar-list-item ">
    <a href="{{ route('administrador/check') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-bell">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
            <path d="M13.73 21a2 2 0 0 1-3.46 0" />
        </svg>
        <span>Check-in/Check-out</span>
    </a>
</li>
<li class="sidebar-list-item ">
    <a href="{{ route('administrador/reportes') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-bell">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
            <path d="M13.73 21a2 2 0 0 1-3.46 0" />
        </svg>
        <span>Reportes</span>
    </a>
</li>
<li class="sidebar-list-item ">
    <a href="{{ route('administrador/cochera') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-bell">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
            <path d="M13.73 21a2 2 0 0 1-3.46 0" />
        </svg>
        <span>Cochera</span>
    </a>
</li>
<li class="sidebar-list-item ">
    <a href="{{ url('api/logout') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-bell">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
            <path d="M13.73 21a2 2 0 0 1-3.46 0" />
        </svg>
        <span>Cerrar sesion</span>
    </a>
</li>
@endsection
{{-- Final del sidebar --}}

@section('app-content')
    @section('title')   
        Informacion del Huesped
    @endsection
        <form action="{{ route('/administrador/realizarReserva') }}" class="form form-updateUser" method="POST">
            @csrf
            <input class="form-input" type="hidden" name="fecha_reserva" value="{{ date('d-m-Y H:i') }}" required>
            <input type="hidden" name="id_huesped" value="{{$id_huesped}}" required>
            <div class="form-group">
                <input class="form-input" type="number" name="cantidad_dias" class="form-input" placeholder="Cantidad Dias" value="1" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="number" name="pax_reserva" class="form-input" placeholder="Nro de PAX" value="1" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="number" name="nro_habitacion_reserva" class="form-input" placeholder="Nro de Habitacion" value="" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="text" name="tipo_habitacion_reserva" class="form-input" placeholder="Tipo de Habitacion" value="" required>
            </div>
            <div>
                <button class="btn-success">Realizar Reserva</button>
            </div>
        </form>
    



@endsection