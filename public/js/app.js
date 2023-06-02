function validateRecep(e) {
    e.preventDefault();
}

function validateRecepUser(e) {
    e.preventDefault();
    let contra1 = document.getElementById('contrasena').value;
    let contra2 = document.getElementById('contrasena-confirm').value;
    if(contra1 == contra2 && contra1.length > 8) {
        // Contraseñas iguales y mayores de 8 caracteres
        document.querySelector('.form-updateUser').submit();
    } else {
        if(contra1.length < 8) {
            alert('Contraseña muy corta');
        } else {
            alert('Contraseñas no son iguales');
        }
    }
}

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

function showEditRecep(e) {
    e.preventDefault();
    let btn1 = document.getElementById('btn-edit-store');
    let btn2 = document.getElementById('btn-edit-cancel');
    let btn3 = document.getElementById('btn-edit');
    let campos = document.querySelectorAll(".form-update .card-content .card-group input");
    campos.forEach((campo) => {
        campo.removeAttribute('disabled');
    })

    btn3.style.display = 'none';
    btn1.style.display = 'initial';
    btn2.style.display = 'initial';
}
function showEditRecepDisable(e) {
    e.preventDefault();
    let btn1 = document.getElementById('btn-edit-store');
    let btn2 = document.getElementById('btn-edit-cancel');
    let btn3 = document.getElementById('btn-edit');
    let campos = document.querySelectorAll(".form-update .card-content .card-group input");
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
        });
    }
    let list = document.querySelector(".list");
    if (list !== null) {
        list.addEventListener("click", function () {
            document.querySelector(".list").classList.add("active");
            document.querySelector(".grid").classList.remove("active");
            document.querySelector(".products-area-wrapper").classList.remove("gridView");
            document.querySelector(".products-area-wrapper").classList.add("tableView");
        });
    }

    var modeSwitch = document.querySelector('.mode-switch');
    modeSwitch.addEventListener('click', function () {
        document.documentElement.classList.toggle('light');
        modeSwitch.classList.toggle('active');
    });
})
