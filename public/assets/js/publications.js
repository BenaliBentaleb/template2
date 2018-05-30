/*global $*/

$(document).ready(function () {





    var mixer = mixitup("#publications", {
        selectors: {
            control: '[data-mixitup-control]'
        }
    });

    $('.shuffle button').click(function () {
        $(this).addClass('selected').siblings().removeClass('selected');
    });
});