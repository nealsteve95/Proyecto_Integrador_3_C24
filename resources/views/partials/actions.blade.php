<div class="app-content-actions">
    <select name="campo-busqueda" id="campoBusqueda" class="form-select">
        <option value="">-- Campo --</option>
        @yield('campos-búsqueda')
    </select>
    <input id="barraBusqueda" class="search-bar" placeholder="Buscar..." type="text" oninput="search()">
    <div class="app-content-actions-wrapper">
        <div class="filter-button-wrapper">
            <button class="action-button filter jsFilter">
                <span>Filtro</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
            </button>
            <div class="filter-menu">
                @yield('filter-menu')
                <div class="filter-menu-buttons">
                    <button class="filter-button reset">
                        Reiniciar
                    </button>
                    <button class="filter-button apply">
                        Aplicar
                    </button>
                </div>
            </div>
        </div>
        <button class="action-button list active" title="List View">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
    </div>
</div>
