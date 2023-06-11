@extends('partials/template')
@section('sidebar-list')
    <li class="sidebar-list-item">
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
@endsection
@section('app-content')
    @section('activate-huesp')
        active
    @endsection
    @section('title')
        Creacion de huesped
    @endsection
    <div class="form-parent">
        <form action="{{ route('recepcionista/huespedes-create') }}" class="form" method="POST">
            @csrf
            <div class="form-group">
                <input class="form-input" type="number" name="identificacion" class="form-input" placeholder="identificacion" required>
            </div>

            <div class="form-group">
                <input class="form-input" type="hidden" value="huesped" name="permisos">
                <label for="turno" class="form-label label-radio">Tipo de identificacion</label>
                <div class="form-radio_2">
                    <dir class="radio-group form-check-input">
                        <input class="form-input" type="radio" name="tipo_identificacion" value="DNI" checked><span>DNI</span>
                    </dir>
                    <div class="radio-group">
                        <input class="form-input" type="radio" name="tipo_identificacion" value="Identificacion Extranjera"><span>Extranjero</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input class="form-input" type="text" placeholder="Nombres" name="nombres" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="text" placeholder="Apellidos" name="apellidos" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="hidden" value="huesped" name="permisos">
                <label for="turno" class="form-label label-radio">Sexo</label>
                <div class="form-radio_3">
                    <dir class="radio-group form-check-input">
                        <input class="form-input" type="radio" name="sexo" value="masculino" checked><span>Masculino</span>
                    </dir>
                    <div class="radio-group">
                        <input class="form-input" type="radio" name="sexo" value="femenino"><span>Femenino</span>
                    </div>
                    <div class="radio-group">
                        <input class="form-input" type="radio" name="sexo" value="no identificado"><span>Otros</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input class="form-input" type="date" placeholder="fecha de nacimiento" name="fecha_nacimiento" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="text" placeholder="nacionalidad" name="nacionalidad" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="text" placeholder="region y direccion" name="region_direccion" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="tel" placeholder="Telefono" name="telefono" required>
            </div>

            <div class="form-group">
                <input class="form-input" type="email" placeholder="Correo electrónico" name="correo" required>
            </div>

            <div class="form-group">
                <input class="form-input" type="number" placeholder="RUC" name="RUC" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="text" placeholder="nombre de la empresa" name="razon_social" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="text" placeholder="direccion de la empresa" name="direccion_empresa" required>
            </div>

            <div class="form-group">
                <button type="submit" class="raise btn-green">Generar recepcionista</button>
                <a href="{{ route('recepcionista/huespedes') }}" class="raise btn-red button">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
