$(function(){
	'use strict';

	$(".select-search").select2();

	$('.clone-widget').cloneya();

	$('.clone-link').cloneya();

})

$.datepicker.regional['es'] = {
	closeText: 'Cerrar',
	prevText: '<',
	nextText: '>',
	currentText: 'Hoy',
	monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
	weekHeader: 'Sm',
	dateFormat: 'dd/mm/yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
};

$.datepicker.setDefaults($.datepicker.regional['es']);

function fecha(input)
{
	$( input ).datepicker({
        dateFormat: 'dd/mm/yy'
    });
}

function mascara(input, mascara)
{
	$(input).mask(mascara, {placeholder:'_'});
}