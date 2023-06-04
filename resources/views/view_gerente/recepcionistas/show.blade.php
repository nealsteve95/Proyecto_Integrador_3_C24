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
        Recepcionista {{ $administrador->nombres }} {{ $administrador->apellidos }}
    @endsection

    <div class="form-parent card-show-parent">
        <div class="form">
            <form class="form-update" action="{{ route('gerente/recepcionistas-update', ['id' => $administrador->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" value="recepcionista" name="permisos">
                <div class="card-header">
                    <p>Información recepcionista</p>
                </div>
                <div class="card-content">
                    <div class="card-group form-group">
                        <label for="dni">DNI</label>
                        <input class="form-input" type="number" name="dni" value="{{ $administrador->dni }}" disabled>
                    </div>
                    <div class="card-group form-group">
                        <label for="nombres">Nombres</label>
                        <input class="form-input" type="text" name="nombres" value="{{ $administrador->nombres }}" disabled>
                    </div>
                    <div class="card-group form-group">
                        <label for="apellidos">Apellidos</label>
                        <input class="form-input" type="text" name="apellidos" value="{{ $administrador->apellidos }}" disabled>
                    </div>
                    <div class="card-group form-group">
                        <label for="telefono">Telefono</label>
                        <input class="form-input" type="tel" name="telefono" value="{{ $administrador->telefono }}" disabled>
                    </div>
                    <div class="card-group form-group">
                        <label for="turno" class="form-label label-radio">Turno</label>
                        <div class="form-radio">
                            <dir class="radio-group form-check-input">
                                <input class="form-input" disabled type="radio" name="turno" value="mañana"
                                @if ($administrador->turno == 'mañana')
                                    checked
                                @endif><span>Mañana</span>
                            </dir>
                            <div class="radio-group">
                                <input class="form-input" disabled type="radio" name="turno" value="tarde"
                                @if ($administrador->turno == 'tarde')
                                    checked
                                @endif><span>Tarde</span>
                            </div>
                            <div class="radio-group">
                                <input class="form-input" disabled type="radio" name="turno" value="noche"
                                @if ($administrador->turno == 'noche')
                                    checked
                                @endif><span>Noche</span>
                            </div>
                            <div class="radio-group">
                                <input class="form-input" disabled type="radio" name="turno" value="finesSemana"
                                @if ($administrador->turno == 'finesSemana')
                                    checked
                                @endif><span>Otros</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-group form-group buttons">
                        <button class="raise btn-green" id="btn-edit" type="submit" onclick="showEditRecep(event)">Editar campos</button>
                        <button class="raise btn-green" id="btn-edit-store" type="submit" >Guardar cambios</button>
                        <button class="raise btn-red" id="btn-edit-cancel" type="submit" onclick="showEditRecepDisable(event)">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="form">
            <form class="form-updateUser" action="{{ route('gerente/recepcionistas-updateUser', ['id' => $administrador->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card-header">
                    <p>Datos de usuario</p>
                </div>
                <div class="card-content">
                    <div class="card-group form-group">
                        <label for="correo">Correo</label>
                        <input class="form-input" type="email" name="correo" value="{{ $administrador->correo }}" disabled>
                    </div>
                    <div class="card-group form-group">
                        <label for="contrasena">Contraseña</label>
                        <input class="form-input" type="password" placeholder="Contraseña" name="contrasena" id="contrasena" value="{{ $administrador->contrasena }}" disabled>
                    </div>
                    <div class="card-group form-group" id="recepUpdate-contraConfirm">
                        <label for="contrasena-confirm">Confirmar Contraseña</label>
                        <input class="form-input" type="password" placeholder="Confirmar contraseña" name="contrasena-confirm" id="contrasena-confirm" disabled>
                    </div>
                    <div class="card-group form-group buttons">
                        <button class="raise btn-green" id="btn-editUser" type="submit" onclick="showEditRecepUser(event)">Editar campos</button>
                        <button class="raise btn-green" id="btn-editUser-store" type="submit" onclick="validateRecepUser(event)">Guardar cambios</button>
                        <button class="raise btn-red" id="btn-editUser-cancel" type="submit" onclick="showEditRecepUserDisable(event)">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
