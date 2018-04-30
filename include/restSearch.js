$(function() {

    $( "#Time" ).autocomplete({


        source: function(request, response) {
            $.getJSON(
                'http://localhost:81/PaintballSocialNetwork-Players/Teams/'  + request.term ,
                function (data) {

                    response($.map(data.TIMES, function (opt) {

                        return {

                            value: opt.nome,
                            label: opt.nome,
                            key: opt.id,

                        }
                    }))
                })
        },

        select: function (event, ui) {

            $("#IDTime").val(ui.item.key);

        }

    });

});