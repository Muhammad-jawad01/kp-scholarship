$(document).ready(function () {
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;





    $(".next").click(function () {




        var form = $("#participant");
        form.validate({
            ignore: 'input[type="button"],input[type="submit"]',
            rules: {
                name: {
                    required: true
                },

            }
        });


        if (form.valid() == false) {

            return;
        }



        current_fs = $(this).parent().parent();
        next_fs = $(this).parent().parent().next();
        console.log(next_fs)
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({ 'opacity': opacity });
            },
            duration: 600
        });
    });

    $(".previous").click(function () {

        current_fs = $(this).parent().parent();
        previous_fs = $(this).parent().parent().prev();


        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({ 'opacity': opacity });
            },
            duration: 600
        });
    });




});