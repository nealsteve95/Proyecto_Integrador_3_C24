@extends('partials/template')
@section('sidebar-list')
    <li class="sidebar-list-item">
        <a href="{{ route('gerente/home') }}">
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
        <a href="{{ route('gerente/huespedes') }}">
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
        <a href="{{ route('gerente/habitaciones') }}">
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
        <a href="{{ route('gerente/reportes') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="feather feather-bell">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
            </svg>
            <span>Reportes</span>
        </a>
    </li>
    <li class="sidebar-list-item active">
        <a href="{{ route('gerente/recepcionistas') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="feather feather-bell">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
            </svg>
            <span>Recepcionistas</span>
        </a>
    </li>
@endsection
@section('app-content')
    @section('activate-report')
        active
    @endsection
    @section('title')
        Creacion de recepcionista
    @endsection
    <div class="form-parent">
        <form action="" class="form">
            <div class="form-group">
                <label for="dni" class="form-label">Dni</label>
                <input type="number" name="dni" class="form-input" placeholder="Dni">
            </div>
            <div class="form-group">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" placeholder="Nombres" name="nombres">
            </div>
            <div class="form-group">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" placeholder="Apellidos" name="apellidos">
            </div>
            <div class="form-group">
                <label for="turno" class="form-label">Turno</label>
                <input type="radio" name="turno" value="mañana" checked>Mañana
                <input type="radio" name="turno" value="tarde">Tarde
            </div>
            <div class="form-group">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="tel" placeholder="Telefono" name="telefono">
            </div>
            <div class="form-group">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input type="text" placeholder="Correo electrónico" name="correo">
            </div>
            <div class="form-group">
                <label for="img-perfil" class="form-label">Imagen de perfil</label>
                <input type="file" name="img-perfil" placeholder="Imagen de perfil">
            </div>
            <div class="form-group">
                <label for="contra" class="form-label">Contraseña</label>
                <input type="text" placeholder="Contraseña" name="contra">
            </div>
            <div class="form-group">
                <label for="contra-confirm" class="form-label">Confirmar contraseña</label>
                <input type="text" placeholder="Confirmar contraseña" name="contra-confirm">
            </div>
        </form>
    </div>
@endsection
