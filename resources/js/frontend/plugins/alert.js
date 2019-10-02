import swal from 'sweetalert2';

window.swal = swal

const Toast = swal.mixin({
    toast: true,
    position: 'bottom',
    showConfirmButton: false,
    timer: 3000
});
