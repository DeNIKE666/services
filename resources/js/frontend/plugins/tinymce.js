// Import TinyMCE
import tinymce from 'tinymce/tinymce';

// A theme is also required
import 'tinymce/themes/silver';

tinyMCE.baseURL = "/assets/frontend/js/plugins/tinymce";// trailing slash important

tinyMCE.init({
    selector: "textarea",
    language: 'ru',
    height: 250,
    menubar:false,
    statusbar: true,
    plugins: ['lists' , 'emoticons' , 'media'],
    charwordcount_include_tags: false,
    spellchecker_language: 'ru',
    toolbar: 'paste undo redo | bold italic underline| numlist bullist | emoticons | media',
    max: 10,
    setup: function(e){
        e.on('keyUp', function(e){

            var len = tinymce.activeEditor.getContent().length;
            var editor = tinymce.activeEditor.contentDocument.body;

            var html = $('#char').text('Введено символов ' + len + ' из 2000');

            if (len > 2000) {
                editor.style.backgroundColor = "rgba(212, 212, 212, 0.42)";
            }
        });
    }
});

function body() {
    tinymce.activeEditor.on('change', function(){

        if (this.tinymce().getContent().length == 1) {
            this.contentDocument.body.style.backgroundColor = "rgba(212, 212, 212, 0.42)";
        }
    });
}