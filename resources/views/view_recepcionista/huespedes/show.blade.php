@extends('partials/template')
@section('sidebar-list')
    <li class="sidebar-list-item">
        <a href="{{ route('administrador/home') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" />
            </svg>
            <span>Home</span>
        </a>
    </li>
    <li class="sidebar-list-item ">
        <a href="{{ route('administrador/huespedes') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-shopping-bag">
                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <path d="M16 10a4 4 0 0 1-8 0" />
            </svg>
            <span>Huespedes</span>
        </a>
    </li>
    <li class="sidebar-list-item ">
        <a href="{{ route('administrador/habitaciones') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-pie-chart">
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
    Informacion de huesped: {{ $huesped->nombres }} {{ $huesped->apellidos }}
@endsection

<div class="form-parent card-show-parent">
    <div class="form">
        <form class="form-update" action="{{ url('/administrador/huespedes-update', ['id' => $huesped->_id]) }}"
            method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" value="huesped" name="permisos">
            <div class="card-header">
                <p>datos huesped</p>
            </div>
            <div class="card-content">
                <div class="card-group form-group">
                    <label for="identificacion">identificacion</label>
                    <input class="form-input" type="number" name="identificacion"
                        value="{{ $huesped->identificacion->identificacion_huesped }}" disabled required>
                </div>

                <div class="card-group form-group">
                    <label for="tipo_identificacion" class="form-label label-radio">tipo de identificacion</label>
                    <div class="form-radio_2">
                        <dir class="radio-group form-check-input">
                            <input class="form-input" disabled type="radio" name="tipo_identificacion" value="DNI"
                                @if ($huesped->identificacion->tipo_identificacion == 'DNI') checked @endif><span>DNI</span>
                        </dir>
                        <div class="radio-group">
                            <input class="form-input" disabled type="radio" name="tipo_identificacion"
                                value="identificacion extranjera"
                                @if ($huesped->identificacion->tipo_identificacion == 'identificacion extranjera') checked @endif><span>Extranjero</span>
                        </div>
                    </div>
                </div>

                <div class="card-group form-group">
                    <label for="nombres">Nombres</label>
                    <input class="form-input" type="text" name="nombres" value="{{ $huesped->nombres }}" disabled
                        required>
                </div>
                <div class="card-group form-group">
                    <label for="apellidos">Apellidos</label>
                    <input class="form-input" type="text" name="apellidos" value="{{ $huesped->apellidos }}" disabled
                        required>
                </div>

                <div class="card-group form-group">
                    <label for="tipo_identificacion" class="form-label label-radio">Sexo</label>
                    <div class="form-radio_3">
                        <dir class="radio-group form-check-input">
                            <input class="form-input" disabled type="radio" name="sexo" value="masculino"
                                @if ($huesped->sexo == 'masculino') checked @endif><span>Masculino</span>
                        </dir>
                        <div class="radio-group">
                            <input class="form-input" disabled type="radio" name="sexo" value="femenino"
                                @if ($huesped->sexo == 'femenino') checked @endif><span>Femenino</span>
                        </div>
                        <div class="radio-group">
                            <input class="form-input" disabled type="radio" name="sexo" value="no identificado"
                                @if ($huesped->sexo == 'no identificado') checked @endif><span>otro</span>
                        </div>
                    </div>
                </div>


                <div class="card-group form-group">
                    <label for="fecha_nacimiento">fecha de nacimiento</label>
                    <input class="form-input" type="date" name="fecha_nacimiento"
                        value="{{ $huesped->fecha_nacimiento }}" disabled>
                </div>

                <div class="card-group form-group">
                    <label for="nacionalidad">nacionalidad</label>
                    <input class="form-input" type="text" name="nacionalidad"
                        value="{{ $huesped->nacionalidad }}" disabled>
                </div>
                <div class="card-group form-group">
                    <label for="region_direccion">region</label>
                    <input class="form-input" type="text" name="region" value="{{ $huesped->region }}"
                        disabled>
                </div>
                <div class="card-group form-group">
                    <label for="region_direccion">direccion</label>
                    <input class="form-input" type="text" name="direccion" value="{{ $huesped->direccion }}"
                        disabled>
                </div>

                <div class="card-group form-group">
                    <label for="telefono">Telefono</label>
                    <input class="form-input" type="tel" name="telefono" value="{{ $huesped->telefono }}"
                        disabled>
                </div>

                <div class="card-group form-group">
                    <label for="correo">Correo</label>
                    <input class="form-input" type="email" name="correo" value="{{ $huesped->correo }}"
                        disabled>
                </div>

                <div class="card-group form-group buttons">
                    <button class="raise btn-green" id="btn-edit" type="submit"
                        onclick="showEditRecep(event)">Editar campos</button>
                    <button class="raise btn-green" id="btn-edit-store" type="submit">Guardar cambios</button>
                    <button class="raise btn-red" id="btn-edit-cancel" type="submit"
                        onclick="showEditRecepDisable(event)">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="form">
        <form class="form-updateUser"
            action="{{ url('administrador/huespedes-updateEmpresa', ['id' => $huesped->_id]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="card-header">
                <p>Datos de empresa</p>
            </div>
            <div class="card-content">
                <div class="card-group form-group">
                    <label for="RUC">RUC</label>
                    <input class="form-input" type="number" name="RUC"
                        value="{{ $huesped->empresa->ruc_empresa }}" disabled>
                </div>
                <div class="card-group form-group">
                    <label for="razon_social">razon social</label>
                    <input class="form-input" type="text" placeholder="nombre de la empresa" name="razon_social"
                        value="{{ $huesped->empresa->razon_social }}" disabled>
                </div>
                <div class="card-group form-group">
                    <label for="direccion_empresa">direccion</label>
                    <input class="form-input" type="text" placeholder="direccion de la empresa"
                        name="direccion_empresa" value="{{ $huesped->empresa->direccion_empresa }}" disabled>
                </div>
                <div class="card-group form-group buttons">
                    <button class="raise btn-green" id="btn-editUser" type="submit"
                        onclick="showEditRecepUser(event)">Editar campos</button>
                    <button class="raise btn-green" id="btn-editUser-store" type="submit">Guardar cambios</button>
                    <button class="raise btn-red" id="btn-editUser-cancel" type="submit"
                        onclick="showEditRecepUserDisable(event)">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
