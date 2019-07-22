(function ($) {
    $(function () {

        $('.sidenav').sidenav();

        $('input, select, textarea').on('focus', function () {
            $(this).parent().find('.helper-text.red-text').remove();
        });

        $('select').formSelect();

        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoClose: true,
        });

        $('.tooltipped').tooltip();

    }); // end of document ready
})(jQuery); // end of jQuery name space
