@extends('partials/template')
@section('sidebar-list')
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
<li class="sidebar-list-item ">
    <a href="{{ route('administrador/reservas') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" 
        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap=“round” 
        stroke-linejoin="round" class="feather feather-book"> 
        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/> 
        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/> 
    </svg>

        <span>Reservas</span>
    </a>
</li>
<li class="sidebar-list-item active">
    <a href="{{ route('administrador/check') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
            <circle cx="12" cy="12" r="10"></circle>
            <polyline points="12 6 12 12 16 14"></polyline>
        </svg>
        
          
        <span>Check-in/Check-out</span>
    </a>
</li>
<li class="sidebar-list-item ">
    <a href="{{ route('administrador/reportes') }}">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12v-2a4 4 0 0 0-3-3.87V6a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8"/>
            <polyline points="22,12 18,12 15,21"/>
            <line x1="10" y1="9" x2="10" y2="9"/>
            <line x1="10" y1="13" x2="10" y2="13"/>
            <line x1="14" y1="9" x2="14" y2="9"/>
            <line x1="14" y1="13" x2="14" y2="13"/>
        </svg>
        
        <span>Reportes</span>
    </a>
</li>
<li class="sidebar-list-item ">
    <a href="{{ route('administrador/cochera') }}">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 9v9a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9"/>
            <path d="M9 22V12h6v10M2 10.6L12 2l10 8.6M12 2v6.01"/>
        </svg>
        
        <span>Cochera</span>
    </a>
</li>
<li class="sidebar-list-item ">
    <a href="{{ url('api/logout') }}">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
            <polyline points="16 17 21 12 16 7"/>
            <line x1="21" y1="12" x2="9" y2="12"/>
        </svg>
        
        <span>Cerrar sesion</span>
    </a>
</li>
@endsection
@section('app-content')
    @section('activate-report')
        active
    @endsection
    @section('title')
        Generar Check Out
    @endsection
    <div class="form-parent">
        <form action="{{ url('/administrador/generarCheckOut') }}" class="form form-updateUser" method="POST">
            @csrf
            <div class="form-group">
                <input class="form-input" type="text" name="nombre" class="form-input" placeholder="Nombre de Recepcionista" value="{{$user["name"]}}" required readonly>
            </div>
            <div class="form-group">
                <input class="form-input" type="text" name="id_checkin" class="form-input" placeholder="Id Check In" value="{{$data["_id"]}}" required readonly>
            </div>
            <input type="hidden" value="{{$user["_id"]}}" name="id_recepcionista">
            <div class="form-group">
                <input class="form-input" type="text" placeholder="Forma de Pago" name="forma_pago" value="" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="text" placeholder="Estado de Pago" name="estado_pago" value="" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="text" placeholder="Descripcion Salida" name="descripcion_salida" value="" required>
            </div>
            <input class="form-input" type="hidden" name="fecha_salida" value="{{ date('d-m-Y H:i') }}" required>
            
            <div class="form-group">
                <button type="submit" class="raise btn-green">Generar check out</button>
                <a href="{{ route('administrador/check') }}" class="raise btn-red button">Cancelar</a>
            </div>
        </form>
    </div>
@endsection