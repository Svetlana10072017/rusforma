$(document).ready(function () {


    $('.small a').click(function (e) { //объект для блокировки стандартного поведения ссылки
        e.preventDefault(); //блокировки стандартного поведения

        if ($('.big img').attr('src') != $(this).attr('href')) {

            $('.big img').hide().attr('src', $(this).attr('href')).fadeIn(600).css({
                width: '100%',
                height: '100%',

            })

        }



    });




    $('.small a img').click(function () {

        $(this).fadeTo(600, 0.6).css(
            {
                border: '1px solid coral',
            }
        )
    });
    $(document).mouseup(function () {
        $('.small a img').fadeTo(0, 1).css(
            {
                border: 'none',
            });
    });




 $('.phone').mask(" +7 (999) 999-99-99");





	$('.js-select2').select2({
		placeholder: "Выберите город",
		maximumSelectionLength: 2,
		language: "ru"
	});


});
