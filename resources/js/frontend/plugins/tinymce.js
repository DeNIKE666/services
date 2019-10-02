// Import TinyMCE
import tinymce from 'tinymce/tinymce';

// A theme is also required
import 'tinymce/themes/silver';

tinyMCE.baseURL = "/assets/frontend/js/plugins/tinymce";// trailing slash important

tinymce.init({
    selector: "textarea",
    language: 'ru',
    height: 250,
    menubar:false,
    statusbar: false,
    plugins: ['link' , 'lists' , 'autosave' , 'emoticons' , 'media'],
    spellchecker_language: 'ru',
    toolbar: 'link paste undo redo | bold italic underline| numlist bullist | restoredraft | emoticons | media',
});
