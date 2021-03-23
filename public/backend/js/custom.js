(function ($) {
    "use strict";
    $('.editor').summernote({
        tabsize: 2,
        height: 300,
		toolbar: [
		
		 ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['fontname', 'fontsize', 'underline', 'strikethrough', 'superscript', 'subscript']],
    ['color', ['color']],
    ['para', ['style','ul', 'ol', 'paragraph', 'height']],
	 ['insert', ['picture', 'link', 'video', 'table', 'hr']],
	 ['misc', ['fullscreen', 'codeview', 'undo', 'redo', 'help']]
  
		 ]
    });
    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy/mm/dd"
    });
    $( "#datepicker1" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy/mm/dd"
    });
    $( "#timepicker" ).timepicker();
})(jQuery);
