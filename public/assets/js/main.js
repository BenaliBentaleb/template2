$('#summernote-status').summernote({
placeholder: 'Enter le contenu du status ..',
height: 100
});
$('#summernote-blog').summernote({
placeholder: 'Enter le contenu du blog ..',
height: 100
});
$('#summernote-faq').summernote({
placeholder: 'Enter le contenu de la FAQ ..',
height: 100
});

$('#profile-picture').change(function() {
  $('#profile-picture-form').submit();
});
$(document).ready(function () {

  $("#add-choix").click(function () {
    if($(".sondage-form input").length <5) {
      input = jQuery('<li><label class="form-label">Choix ' + ($(".sondage-form input").length + 1) + ':</label><input class="form-control" type="text" name="choix' +($(".sondage-form input").length + 1) + '"></li>');
    jQuery('.sondage-form').append(input);
    input.hide().show('slow');
    }else {
      $("#add-choix").hide('slow');
    }
  });

});

$('#cover').change(function() {
  $('#cover-form').submit();
});
/*var mixer = mixitup('.memoires',{
  multifilter: {
      enable: true // enable the multifilter extension for the mixer
  },
  selectors: {
    control: '[data-mixitup-control]'
  }
});

$('.shuffle li').click(function(){
      $(this).addClass('selected').siblings().removeClass('selected');
  })*/