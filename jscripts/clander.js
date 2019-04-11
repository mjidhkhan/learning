$(document).ready(function() {
    $('#date').datepicker({
        showOn: 'both',
        buttonImage: 'images/calendar.png',
        buttonImageOnly: true,
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });
});