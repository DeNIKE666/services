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
    plugins: ['lists' , 'paste'],
    charwordcount_include_tags: false,
    spellchecker_language: 'ru',
    toolbar: 'undo redo | bold italic underline| numlist bullist ',
    forced_root_block : '',
    paste_enable_default_filters: true,
   // forced_root_block_attrs: { "class": "margin-bottom-10 p-seller"},
    setup: function (e) {

        e.on('init', function (e) {
            document.getElementById("char").innerHTML = "Введено символов: " + CountCharacters() +  ' из / 2000';
        });

        e.on('keyUp', function (e) {
            document.getElementById("char").innerHTML = "Введено символов: " + CountCharacters() +  ' из / 2000';
            ValidateCharacterLength();
        });
    }
});

function CountCharacters() {
    var body = tinymce.get("text").getBody();
    var content = tinymce.trim(body.innerText || body.textContent);
    return content.length;
};

function ValidateCharacterLength() {

    var max = 2000;
    var count = CountCharacters();
    var char = $('#char');
    var button = $('button[type=submit]');

    if (count > max) {
        char.text('Вы привысили допустимое значение текста, масимум допустимо ' + max).css('color' , 'red');
        button.attr('disabled', true).css('background-color' , 'red');
    } else {
        char.css('color' ,'#737373');
        button.attr('disabled' , false).css('background-color' , '#2a41e8');
    }
}