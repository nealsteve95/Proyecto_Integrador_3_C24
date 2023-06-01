@extends('view_gerente/partials/template')

@section('app-content')
    @section('activate-report')
        active
    @endsection
    @section('title')
        Reportes
    @endsection
    @section('app-content-actions')
        @component('view_gerente/partials/actions')
            @section('filter-menu')
            {{-- Aquí las opciones de filtro: <label> <option> </label> --}}
            @endsection
        @endcomponent
    @endsection
    @section('button-insert')
        <button class="app-content-headerButton">Generar reporte</button>
    @endsection
@endsection
