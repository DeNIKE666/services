// Import TinyMCE
import tinymce from 'tinymce/tinymce';

// A theme is also required
import 'tinymce/themes/silver';

// Any plugins you want to use has to be imported
import 'tinymce/plugins/paste';
import 'tinymce/plugins/link';

tinyMCE.baseURL = "/assets/frontend/js/tinymce";// trailing slash important

tinymce.init({
    selector: "textarea",
    contextmenu: "link image imagetools table spellchecker",
});
