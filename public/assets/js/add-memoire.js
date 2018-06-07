 $(document).ready(function () {
            $("#memoiretype").change(function () {
                var val = $(this).val();
                if (val == "licence") {
                    $("#memoireannee").html(
                        "<option value='ti'>TI</option><option value='sci'>SCI</option><option value='si'>SI</option><option value='gl'>GL</option>"
                    );
                } else if (val == "master") {
                    $("#memoireannee").html(
                        "<option value='stic'>STIC</option><option value='rsd'>RSD</option><option value='stiw'>STIW</option><option value='gl'>GL</option>"
                    );
                }
            });
        });