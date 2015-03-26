(function( $ ) {
   $.fn.getUpload = function(options) {
      var settings = $.extend( {
         'maxSize'          : '1024000',
         'width'            : '230', 
         'height'           : '230', 
         'count'            : '1',  
         'sizes'            : 's#230#230',
         'resizes'          : 'b#700#500',
      }, options);
      $json = JSON.stringify(settings);
      $(this).wrap('<form method="POST" action="/admin/uploadphoto"></form>');
      $(this).before("<input type='hidden' name='data' value='" + $json + "' />");
   };
})(jQuery);