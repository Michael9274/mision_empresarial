$(document).ready(function() {
    //configuracion pagina 0
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);

                $('#blah').hide();
                $('#blah').fadeIn(650);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp").change(function() {
        readURL(this);
    });
    $('.custom-select').change(function() {
        $(".resultTxt").css({fontFamily: $(this).val()})
    });
    $('#c3').minicolors({format: 'rgb'});

    //Home pagina 1
    $( ".url-video-about" ).keyup(function () {
        $(".youtube-video").attr("src", $(this).val() )
    });


    let linksParent = $('.ctn-tabs-links'),
        items = $('.ctn-tabs-contents-item');

    $('.ctn-icons-tabs').on('click', function() {
        $(this).addClass('active').siblings('.ctn-icons-tabs').removeClass('active');
        items.eq($(this).index()).removeClass('hide').siblings('.ctn-tabs-contents-item').addClass('hide');
    });

    $('#inlineCheckbox1').change(function() {
        $(".content-today-menu").toggle("slow");
    });

    $('.nav-tabs > li a[title]').tooltip();

    $('.next').click(function(){

        var nextId = $(this).parents('.tab-pane').next().attr("id");
        $('[href=#'+nextId+']').tab('show');
        return false;

    })

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        //update progress
        var step = $(e.target).data('step');
        var percent = (parseInt(step) / 3) * 100;

        $('.progress-bar').css({width: percent + '%'});
        $('.progress-bar').text("Step " + step + " of 3");

        //e.relatedTarget // previous tab

    })

    $('.first').click(function(){

        $('#myWizard a:first').tab('show')

    });

    $("#changeCalendar").click(function(){

        $('#CalendarReserveClient').toggle();
        $('#CalendarSetupReservation').toggle();

    });

    calendarConfig();
});