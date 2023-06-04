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
    <li class="sidebar-list-item active">
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
    <li class="sidebar-list-item">
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
        Registro de habitación
    @endsection
    <div class="form-parent">
        <form action="{{ route('gerente/habitaciones-create') }}" class="form" method="POST">
            @csrf
            <input type="hidden" value="Disponible" name="estado">
            <div class="form-group">
                <input class="form-input" type="number" name="nro_habitacion" placeholder="Nro de habitación" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="text" placeholder="Tipo" name="tipo" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="number" placeholder="Precio" name="precio" step="0.01" required>
            </div>
            <div class="form-group">
                <textarea class="form-input" name="caracteristicas" placeholder="Características" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="raise btn-green">Registrar habitación</button>
                <a href="{{ route('gerente/habitaciones') }}" class="raise btn-red button">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
