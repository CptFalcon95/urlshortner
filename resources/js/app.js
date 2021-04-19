import Swal from 'sweetalert2/src/sweetalert2.js'
window.Swal = Swal;

require('./bootstrap')
require('./components/urls/store')
require('./components/urls/update')
require('./components/urls/delete')
require('./components/urls/copy_to_clipboard')