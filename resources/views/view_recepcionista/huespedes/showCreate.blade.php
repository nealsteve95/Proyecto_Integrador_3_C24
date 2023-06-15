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
<li class="sidebar-list-item active ">
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
<li class="sidebar-list-item">
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
<li class="sidebar-list-item">
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
    @section('activate-huesp')
        active
    @endsection
    @section('title')
        Creacion de huesped
    @endsection
    <div class="form-parent">
        @if (session('error'))
        <div class="status">
            Alerta: {{ session('error') }}
        </div>
        @endif
        <form action="{{ route('/administrador/storeHuesped') }}" class="form" method="POST">
            @csrf
            <div class="form-group">
                <input class="form-input" type="number" name="identificacion" class="form-input" placeholder="identificacion" value="{{$data->numero}}" required readonly>
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
                <input class="form-input" type="text" placeholder="Nombres" name="nombres" value="{{$data->nombres}}" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="text" placeholder="Apellidos" name="apellidos" value="{{$data->apellido_paterno}}" required>
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
                <input class="form-input" type="text" placeholder="region" name="region" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="text" placeholder="direccion" name="direccion" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="tel" placeholder="Telefono" name="telefono" required>
            </div>

            <div class="form-group">
                <input class="form-input" type="email" placeholder="Correo electrónico" name="correo" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="hidden" value="huesped" name="permisos">
                <label for="turno" class="form-label label-radio">Empresa</label>
                <div class="form-radio_3">
                    <dir class="radio-group form-check-input">
                        <input class="form-input" type="radio" name="empresa" value="0" checked><span>No</span>
                    </dir>
                    <div class="radio-group">
                        <input class="form-input" type="radio" name="empresa" value="1"><span>Si</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input class="form-input" type="number" placeholder="RUC" name="ruc_empresa">
            </div>
            <div class="form-group">
                <input class="form-input" type="text" placeholder="nombre de la empresa" name="nombre_empresa"required>
            </div>
            <div class="form-group">
                <input class="form-input" type="text" placeholder="razon social" name="razon_social_empresa" required>
            </div>
            <div class="form-group">
                <input class="form-input" type="text" placeholder="direccion de la empresa" name="direccion_empresa" required>
            </div>
            <script>
// Hide the form fields and remove the "required" attribute when the page loads
document.querySelector('[name="ruc_empresa"]').parentElement.style.display = 'none';
document.querySelector('[name="ruc_empresa"]').removeAttribute('required');
document.querySelector('[name="nombre_empresa"]').parentElement.style.display = 'none';
document.querySelector('[name="nombre_empresa"]').removeAttribute('required');
document.querySelector('[name="razon_social_empresa"]').parentElement.style.display = 'none';
document.querySelector('[name="razon_social_empresa"]').removeAttribute('required');
document.querySelector('[name="direccion_empresa"]').parentElement.style.display = 'none';
document.querySelector('[name="direccion_empresa"]').removeAttribute('required');

// Listen for changes to the "empresa" radio buttons
document.getElementsByName('empresa').forEach(function(radio) {
    radio.addEventListener('change', function() {
        if (this.value === '1') {
            document.querySelector('[name="ruc_empresa"]').parentElement.style.display = 'block';
            document.querySelector('[name="ruc_empresa"]').setAttribute('required', '');
            document.querySelector('[name="nombre_empresa"]').parentElement.style.display = 'block';
            document.querySelector('[name="nombre_empresa"]').setAttribute('required', '');
            document.querySelector('[name="razon_social_empresa"]').parentElement.style.display = 'block';
            document.querySelector('[name="razon_social_empresa"]').setAttribute('required', '');
            document.querySelector('[name="direccion_empresa"]').parentElement.style.display = 'block';
            document.querySelector('[name="direccion_empresa"]').setAttribute('required', '');
        } else {
            document.querySelector('[name="ruc_empresa"]').parentElement.style.display = 'none';
            document.querySelector('[name="ruc_empresa"]').removeAttribute('required');
            document.querySelector('[name="nombre_empresa"]').parentElement.style.display = 'none';
            document.querySelector('[name="nombre_empresa"]').removeAttribute('required');
            document.querySelector('[name="razon_social_empresa"]').parentElement.style.display = 'none';
            document.querySelector('[name="razon_social_empresa"]').removeAttribute('required');
            document.querySelector('[name="direccion_empresa"]').parentElement.style.display = 'none';
            document.querySelector('[name="direccion_empresa"]').removeAttribute('required');
            document.querySelector('[name="ruc_empresa"]').value = '';
            document.querySelector('[name="nombre_empresa"]').value = '';
            document.querySelector('[name="razon_social_empresa"]').value = '';
            document.querySelector('[name="direccion_empresa"]').value = '';

        }
    });
});

            </script>
            <div class="form-group">
                <button type="submit" class="raise btn-green">Registrar</button>
                <a href="{{ url('recepcionista/huespedes') }}" class="raise btn-red button">Cancelar</a>
            </div>
        </form>
    </div>
@endsection