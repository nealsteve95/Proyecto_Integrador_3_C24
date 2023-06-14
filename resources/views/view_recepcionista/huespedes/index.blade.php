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
<li class="sidebar-list-item active">
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
<li class="sidebar-list-item ">
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
    @section('title')
        Huespedes registrados
    @endsection
    @section('app-content-actions')
        @component('partials/actions')
            @section('campos-búsqueda')
                <option value="identificacion">Identificacion</option>
                <option value="tipo_identificacion">Tipo Identificacion</option>
                <option value="nombres">Nombres</option>
                <option value="apellidos">Apellidos</option>
                <option value="telefono">Telefono</option>
                <option value="estado">Estado</option>
            @endsection
        @endcomponent
    @endsection
    {{-- Aquí la tabla para mostrar registros --}}
    <div class="products-area-wrapper tableView">
        <div class="products-header">
            <div class="product-cell image">
                Identificacion
                <button class="sort-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button>
            </div>
            <div class="product-cell category">Tipo<button class="sort-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button>
            </div>
            <div class="product-cell status-cell">Nombres<button class="sort-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button>
            </div>
            <div class="product-cell sales">Apellidos<button class="sort-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button>
            </div>
            <div class="product-cell sales">Telefono<button class="sort-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button>
            </div>
            <div class="product-cell stock">Estado
            </div>
        </div>
        {{-- Aquí la lista de huespedes --}}
        @foreach ($huespedes as $huesped)
        <a class="row-element" href="{{ route('gerente/huespedes-show', ['id'=>$huesped->id]) }}">
            <div class="products-row">
                <div class="product-cell identificacion">
                    <span class="value-row">
                        {{$huesped->identificacion}}
                    </span>
                </div>
                <div class="product-cell identificacion">
                    <span class="cell-label">Tipo identificacion:</span>
                    <span class="value-row">{{$huesped->tipo_identificacion}}</span>
                </div>
                <div class="product-cell nombres">
                    <span class="cell-label">Nombres:</span>
                    <span class="value-row">{{$huesped->nombres}}</span>
                </div>
                <div class="product-cell apellidos">
                    <span class="cell-label">Apellidos:</span>
                    <span class="value-row">{{$huesped->apellidos}}</span>
                </div>
                <div class="product-cell telefono">
                    <span class="cell-label">Telefono:</span>
                    <span class="value-row">{{$huesped->telefono}}</span>
                </div>
                <div class="product-cell estado">
                    <span class="cell-label">Estado:</span>
                    <span class="value-row">{{$huesped->estado}}</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
@endsection

