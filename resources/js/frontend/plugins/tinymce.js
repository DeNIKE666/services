// Import TinyMCE
import tinymce from 'tinymce/tinymce';

// A theme is also required
import 'tinymce/themes/silver';

tinyMCE.baseURL = "/assets/frontend/js/plugins/tinymce";// trailing slash important

tinyMCE.init({
    selector: "textarea",
    language: 'ru',
    height: 250,
    menubar: false,
    statusbar: false,
    plugins: ['lists', 'emoticons'],
    charwordcount_include_tags: false,
    spellchecker_language: 'ru',
    toolbar: 'paste undo redo | bold italic underline| numlist bullist | emoticons',
    forced_root_block : '',
   // forced_root_block_attrs: { "class": "margin-bottom-10 p-seller"},
    setup: function (e) {
        e.on('keyUp', function (e) {
            var len = tinymce.activeEditor.getContent().length;
            var editor = tinymce.activeEditor.contentDocument.body;
            var html = $('#char').text('Введено символов ' + len + ' из 2000').css('color' , '#737373');

            if ( len > 2000) {
                editor.style.backgroundColor = "rgba(212, 212, 212, 0.42)";
                $('button[type="submit"]').attr('disabled', true).css('background-color', '#e24a4a');
                html.text('Вы привысили допустимое значение текста').css('color' , '#fb4545db');
            } else {
                editor.style.backgroundColor = "rgb(255, 255, 255)";
                $('button[type="submit"]').attr('disabled', false).css('background-color', '#2a41e8');
                html = html;
            }

        });
    }
});

