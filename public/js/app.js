var displayTable = 'flex';
var sentidoOrden = 'asc';

function sortList(column) {

    let filas = document.getElementsByClassName('products-row');

    let elementos = {};

    for(let i = 0; i < filas.length; i++) {
        let item = filas.item(i).getElementsByClassName(column);
        let value = item.item(0).getElementsByClassName('value-row').item(0).textContent;
        elementos[value] = filas.item(i);
    }

    let orden;

    if(sentidoOrden == 'asc') {
        orden = Object.entries(elementos).sort();
        sentidoOrden = 'desc';
    }else {
        orden = Object.entries(elementos).reverse();
        sentidoOrden = 'asc';
    }

    console.log(orden);

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
    let campos = document.querySelectorAll(".form-update .card-content .card-group .form-input");
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

/* STEP BY STEP ----------------------------------------------------------------------------------------------------------------*/

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

/* Date formatting */
$('input[type="date"], input[type="datetime"], input[type="datetime-local"], input[type="month"], input[type="time"], input[type="week"]').each(function() {
    var el = this, type = $(el).attr('type');
    if ($(el).val() == '') $(el).attr('type', 'text');
    $(el).focus(function() {
        $(el).attr('type', type);
        el.click();
    });
    $(el).blur(function() {
        if ($(el).val() == '') $(el).attr('type', 'text');
    });
});

// Required feilds per set
var toValidate = [
    ["#field1"],
    ["#field2"],
    ["#field3"],
    ["#field4"]
  ];

function validateEmail(email) {
var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
return re.test(email);
}

$(".submit").click(function(e){
	var triggered = false;
    var tab_num = toValidate.length;
    var fields = toValidate[tab_num-1];
    for (i = 0; i < fields.length; i++) { 
      if(jQuery(fields[i]).attr('type') === "email"){
        if (jQuery(fields[i]).val().length <= 0) {
        	jQuery(fields[i]).parent().addClass( "not-valid" );
        	jQuery(fields[i]).parent().removeClass( "email-not-vaild" );
          	triggered = true;
        }
        else if (!validateEmail(jQuery(fields[i]).val())) {
          	jQuery(fields[i]).parent().addClass( "not-valid" );
          	jQuery(fields[i]).parent().addClass( "email-not-vaild" );
          	triggered = true;
        } else{
          	jQuery(fields[i]).parent().removeClass( "not-valid" );
          	jQuery(fields[i]).parent().removeClass( "email-not-vaild" );
        }
      }else if(jQuery(fields[i]).hasClass("checkboxes")){
      	if(jQuery(fields[i]).find('input:checked').length > 0){
      		jQuery(fields[i]).parent().removeClass( "not-valid" );
      	}else{
      		jQuery(fields[i]).parent().addClass( "not-valid" );
          	triggered = true;
      	}
      }else{
        if (jQuery(fields[i]).val().length <= 0) {
          jQuery(fields[i]).parent().addClass( "not-valid" );
          triggered = true;
        }else{
          jQuery(fields[i]).parent().removeClass( "not-valid" );
        }
      }
    }
    if(triggered === true){
    	e.preventDefault();
        return  false;
    }
});

$(".next").click(function(){
	var triggered = false;
    var tab_num = jQuery(this).attr('tab-number');
    var fields = toValidate[tab_num-1];
    for (i = 0; i < fields.length; i++) { 
      if(jQuery(fields[i]).attr('type') === "email"){
        if (jQuery(fields[i]).val().length <= 0) {
        	jQuery(fields[i]).parent().addClass( "not-valid" );
        	jQuery(fields[i]).parent().removeClass( "email-not-vaild" );
          	triggered = true;
        }
        else if (!validateEmail(jQuery(fields[i]).val())) {
          	jQuery(fields[i]).parent().addClass( "not-valid" );
          	jQuery(fields[i]).parent().addClass( "email-not-vaild" );
          	triggered = true;
        } else{
          	jQuery(fields[i]).parent().removeClass( "not-valid" );
          	jQuery(fields[i]).parent().removeClass( "email-not-vaild" );
        }
      }else if(jQuery(fields[i]).hasClass("checkboxes")){
      	if(jQuery(fields[i]).find('input:checked').length > 0){
      		jQuery(fields[i]).parent().removeClass( "not-valid" );
      	}else{
      		jQuery(fields[i]).parent().addClass( "not-valid" );
          	triggered = true;
      	}
      }else{
        if (jQuery(fields[i]).val().length <= 0) {
          jQuery(fields[i]).parent().addClass( "not-valid" );
          triggered = true;
        }else{
          jQuery(fields[i]).parent().removeClass( "not-valid" );
        }
      }
    }
    if(triggered != true){



// End Custom Code
//
		if(animating) return false;
		animating = true;
		
		current_fs = $(this).parent();
		next_fs = $(this).parent().next();
		
		//activate next step on progressbar using the index of next_fs
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		
		//show the next fieldset
		next_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({
	        'transform': 'scale('+scale+')',
	        'position': 'absolute'
	      });
				next_fs.css({'left': left, 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	 }
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

/*
$(".submit").click(function(){
	return false;
})
*/