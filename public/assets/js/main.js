
$(document).ready(function () {
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
  $('#summernote-sondage').summernote({
  placeholder: 'Enter le contenu du sondage ..',
  height: 100
  });

                    

                        // initialize summernote
                        $('#event-content').summernote({
                            height: 100
                        });
                        // and set code
                        $('#event-content').summernote('code', contents);
                    

  
  $('#profile-picture').change(function() {
    $('#profile-picture-form').submit();
  });
  
  $('#cover').change(function() {
    $('#cover-form').submit();
  });
  var mixer = mixitup('.memoires',{
    multifilter: {
        enable: true // enable the multifilter extension for the mixer
    },
    selectors: {
      control: '[data-mixitup-control]'
    }
  });
  
  $('.shuffle li').click(function(){
        $(this).addClass('selected').siblings().removeClass('selected');
    })

  });