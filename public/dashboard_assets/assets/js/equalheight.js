$(window).on('load', function () {


    setTimeout(function () {


        $(".height-equal").each(function () {

            var maxH = 0;
            if (parseInt($(this).attr("data-heightequal-max-width")) < $(window).width()) {

                $(this).find(".height-equal-item").each(function () {
                    if ($(this).height() > maxH) {
                        maxH = $(this).height();
                    }
                });
                $(this).find(".height-equal-item").height(maxH);
            }

        });


    }, 400);


});

$(window).resize(function () {

    $(".height-equal").each(function () {

        var maxH = 0;
        if (parseInt($(this).attr("data-heightequal-max-width")) < $(window).width()) {
            $(this).find(".height-equal-item").each(function () {

                if ($(this).height() > maxH) {
                    maxH = $(this).height();
                }
            });
            $(this).find(".height-equal-item").height(maxH);

        }

    });

});
