import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

window.Swal = Swal;

window.Toast = Swal.mixin({
    toast: true,
    padding: '1.5rem',
    position: 'center',
    showConfirmButton: false,
    timer: 30000
});