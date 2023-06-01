@extends('partials/template')

@section('app-content')
    @section('activate-habit')
        active
    @endsection
    @section('title')
        Habitaciones actuales
    @endsection
    @section('app-content-actions')
        @component('partials/actions')
            @section('filter-menu')
            {{-- Aquí las opciones de filtro: <label> <option> </label> --}}
            @endsection
        @endcomponent
    @endsection

    <div class="products-area-wrapper tableView">
        <div class="products-header">
            <div class="product-cell image">
                Nro habitación
                <button class="sort-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button>
            </div>
            <div class="product-cell status-cell">Tipo<button class="sort-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button>
            </div>
            <div class="product-cell sales">Precio<button class="sort-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button>
            </div>
            <div class="product-cell stock">Estado
                <button class="sort-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button>
            </div>
            <div class="product-cell price">Acciones
            </div>
        </div>
        {{-- Aquí la lista de habitaciones --}}
        @foreach ($habitaciones as $habitacion)
        <a href="{{ route('habitaciones-show', ['id'=>$habitacion->id]) }}">
            <div class="products-row">
                <div class="product-cell image">
                    <span>
                        {{$habitacion->nro_habitacion}}
                    </span>
                </div>
                <div class="product-cell category">
                    <span class="cell-label">Tipo:</span>
                    {{$habitacion->tipo}}
                </div>
                <div class="product-cell status-cell">
                    <span class="cell-label">Precio:</span>
                    {{$habitacion->precio}}
                </div>
                <div class="product-cell sales">
                    <span class="cell-label">Estado:</span>
                    {{$habitacion->estado}}
                </div>
                <div class="product-cell price">
                    <span class="cell-label">Acciones:</span>
                    {{-- Botones para modificar y eliminar --}}
                    <div class="buttons">
                        <form action="{{ route('habitaciones-delete', ['id' => $habitacion->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="raise btn-red">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
@endsection
