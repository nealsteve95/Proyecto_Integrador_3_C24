@extends('partials/template')
@section('sidebar-list')
<li class="sidebar-list-item ">
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
<li class="sidebar-list-item active">
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
    @section('activate-habit')
        active
    @endsection
    @section('title')
        Habitacion nro {{ $habitacion->nro_habitacion }}
    @endsection

    <div class="form-parent card-show-parent">
        <div class="form">
            <form class="form-update" action="{{ route('recepcionista/habitaciones-update', ['id' => $habitacion->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="estado" value="{{ $habitacion->estado }}">
                <div class="card-header">
                    <p>Información de habitación</p>
                </div>
                <div class="card-content">
                    <div class="card-group form-group">
                        <label for="nro_habitacion">Nro de habitación</label>
                        <input class="form-input" type="number" name="nro_habitacion" value="{{ $habitacion->nro_habitacion }}" disabled required>
                    </div>
                    <div class="card-group form-group">
                        <label for="tipo">Tipo</label>
                        <input class="form-input" type="text" name="tipo" value="{{ $habitacion->tipo }}" disabled required>
                    </div>
                    <div class="card-group form-group">
                        <label for="precio">Precio</label>
                        <input class="form-input" type="number" step="0.01" name="precio" value="{{ $habitacion->precio }}" disabled required>
                    </div>
                    <div class="card-group form-group">
                        <label for="caracteristicas">Características</label>
                        <textarea class="form-input" name="caracteristicas" disabled required>{{ $habitacion->caracteristicas }}</textarea>
                    </div>
                    <div class="card-group form-group buttons">
                        <button class="raise btn-green" id="btn-edit" type="submit" onclick="showEditRecep(event)">Editar campos</button>
                        <button class="raise btn-green" id="btn-edit-store" type="submit" >Guardar cambios</button>
                        <button class="raise btn-red" id="btn-edit-cancel" type="submit" onclick="showEditRecepDisable(event)">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
