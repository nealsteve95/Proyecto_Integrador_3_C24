var displayTable = 'flex';
var sentidoOrden = 'asc';

/**
 *
 * Función que ordena las filas de la tabla con respecto a un campo
 * requisitos:
 * - Añadir a los divs de clase product-cell con el nombre del campo
 *   de cada fila, ejem: 'nro_habitacion', 'nombres', etc.
 * - Dentro de dichos divs insertar a los valores dentro de un span con
 *   nombre de clase igual al nombre del campo, ejem: 'nro_habitacion'.
 * - A cada boton de clase sort-button en el header de la tabla añadir
 *   el evento: onclick="sortList(<campo>)" donde el campo sería así
 *   como en los anteriores puntos, ejem: 'nro_habitacion'.
 *
 * @param {string} column
 */
function sortList(column) {

    let filas = document.getElementsByClassName('row-element');

    let elementos = [];

    for(let i = 0; i < filas.length; i++) {
        let item = filas.item(i).getElementsByClassName(column);
        let value = item.item(0).getElementsByClassName('value-row').item(0).textContent;
        elementos.push([value, filas.item(i)]);
    }

    let orden;

    if(sentidoOrden == 'asc') {
        orden = elementos.sort((a, b) => a[0].localeCompare(b[0]));
        sentidoOrden = 'desc';
    }else {
        orden = elementos.sort((a, b) => b[0].localeCompare(a[0]));
        sentidoOrden = 'asc';
    }

    // Removemos todas las filas actuales de la tabla
    let filas_parent = document.querySelector('.tableView');

    filas = filas_parent.querySelectorAll('.row-element');

    filas.forEach((fila) => fila.remove());

    // Insertamos nuevas filas ordenadas
    orden.forEach((fila) => {
        filas_parent.appendChild(fila[1]);
    })

}

/**
 * Función que busca coincidencias con respecto a un campo en el
 * combo box, modificaciones necesarias para búsqueda en tabla:
 * 1. Establecer las opciones en el select de la sección "campos-búsqueda"
 *    section('campos-búsqueda')
 *        <option value="campo1">Campo 1</option>
 *        <option value="campo2">Campo 2</option>
 *        <option value="campo3">Campo 3</option>
 *    endsection
 * 2. Añadir la clase 'row-element' a la etiqueta <a> del forEach
 * 3. A cada div de clase .product-cell añadir como clase el nombre del
 *    campo, ejem: "identificacion", "tipo", "nro_habitacion", etc.
 * 4. A cada valor extraído de un objeto colocarlo dentro de un <span>
 *    de clase 'value-row'
 */
function search() {
    let inputBusqueda = document.getElementById('barraBusqueda').value;
    let campoBusqueda = document.getElementById('campoBusqueda').value;

    let filas = document.getElementsByClassName('products-row');

    for(let i = 0; i < filas.length; i++) {
        let item = filas.item(i).getElementsByClassName(campoBusqueda);
        let value = item.item(0).getElementsByClassName('value-row').item(0).textContent;

        if(value.toLowerCase().includes(inputBusqueda.toLowerCase())) {
            filas.item(i).style.display = displayTable;
        } else {
            filas.item(i).style.display = 'none';
        }
    }
}

/**
 *
 * Función que valida las contraseñas para actualización de credenciales
 * de recepcionista (si el campo está vacío solo actualiza el correo)
 *
 * @param {event} e
 * @param {*} type
 */
function validateRecepUser(e, type) {
    e.preventDefault();
    let contra1 = document.getElementById('contrasena').value;
    let contra2 = document.getElementById('contrasena-confirm').value;

    if(contra1 == "" && contra2 == "" && type == 'update') {
        document.querySelector('.form-updateUser').submit();
    } else if(contra1 != contra2) {
        alert('Contraseñas no son iguales');
    } else if(contra1.length < 8) {
        alert('Contraseña muy corta');
    } else {
        document.querySelector('.form-updateUser').submit();
    }
}

/**
 *
 * Función que habilita campos para actualización y botones
 * para recepcionista
 *
 * @param {event} e
 */
function showEditRecepUser(e) {
    e.preventDefault();
    let btn1 = document.getElementById('btn-editUser-store');
    let btn2 = document.getElementById('btn-editUser-cancel');
    let btn3 = document.getElementById('btn-editUser');
    let contraConfirm = document.getElementById('recepUpdate-contraConfirm');
    let campos = document.querySelectorAll(".form-updateUser .card-content .card-group input");
    campos.forEach((campo) => {
        campo.removeAttribute('disabled');
    })

    btn3.style.display = 'none';
    btn1.style.display = 'initial';
    btn2.style.display = 'initial';
    contraConfirm.style.display = 'flex';
}

/**
 *
 * Función que deshabilita campos de actualización para credenciales de
 * recepcionista, también oculta botones de actualización.
 *
 * @param {event} e
 */
function showEditRecepUserDisable(e) {
    e.preventDefault();
    let btn1 = document.getElementById('btn-editUser-store');
    let btn2 = document.getElementById('btn-editUser-cancel');
    let btn3 = document.getElementById('btn-editUser');
    let contraConfirm = document.getElementById('recepUpdate-contraConfirm');
    let campos = document.querySelectorAll(".form-updateUser .card-content .card-group input");
    campos.forEach((campo) => {
        campo.setAttribute('disabled', true);
    })

    btn3.style.display = 'initial';
    btn1.style.display = 'none';
    btn2.style.display = 'none';
    contraConfirm.style.display = 'none';
}

/**
 *
 * Función que habilita campos para modificación de datos de recepcionista
 * así como botones de actualización.
 *
 * @param {*} e
 */
function showEditRecep(e) {
    e.preventDefault();
    let btn1 = document.getElementById('btn-edit-store');
    let btn2 = document.getElementById('btn-edit-cancel');
    let btn3 = document.getElementById('btn-edit');
    let campos = document.querySelectorAll(".form-update .card-content .card-group .form-input");
    campos.forEach((campo) => {
        campo.removeAttribute('disabled');
    })

    btn3.style.display = 'none';
    btn1.style.display = 'initial';
    btn2.style.display = 'initial';
}

/**
 *
 * Función que deshabilita campos de actualización para datos de
 * recepcionista, también oculta botones de actualización.
 *
 * @param {event} e
 */
function showEditRecepDisable(e) {
    e.preventDefault();
    let btn1 = document.getElementById('btn-edit-store');
    let btn2 = document.getElementById('btn-edit-cancel');
    let btn3 = document.getElementById('btn-edit');
    let campos = document.querySelectorAll(".form-update .card-content .card-group .form-input");
    campos.forEach((campo) => {
        campo.setAttribute('disabled', true);
    })

    btn3.style.display = 'initial';
    btn1.style.display = 'none';
    btn2.style.display = 'none';
}

document.addEventListener('DOMContentLoaded', () => {

    let filter = document.querySelector(".jsFilter");
    if (filter !== null) {
        filter.addEventListener("click", function () {
            document.querySelector(".filter-menu").classList.toggle("active");
        });
    }
    let grid = document.querySelector(".grid");
    if (grid !== null) {
        grid.addEventListener("click", function () {
            document.querySelector(".list").classList.remove("active");
            document.querySelector(".grid").classList.add("active");
            document.querySelector(".products-area-wrapper").classList.add("gridView");
            document.querySelector(".products-area-wrapper").classList.remove("tableView");
            displayTable = 'grid';
            search()
        });
    }
    let list = document.querySelector(".list");
    if (list !== null) {
        list.addEventListener("click", function () {
            document.querySelector(".list").classList.add("active");
            document.querySelector(".grid").classList.remove("active");
            document.querySelector(".products-area-wrapper").classList.remove("gridView");
            document.querySelector(".products-area-wrapper").classList.add("tableView");
            displayTable = 'flex';
            search()
        });
    }

    var modeSwitch = document.querySelector('.mode-switch');
    modeSwitch.addEventListener('click', function () {
        document.documentElement.classList.toggle('light');
        modeSwitch.classList.toggle('active');
    });
})
