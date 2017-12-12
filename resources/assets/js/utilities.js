import swal from 'sweetalert2';

export class Alert {
    static success(title = '', text, confirmButtonText = 'Ok') {
        return swal({
            title,
            text,
            type: 'success',
            confirmButtonText
        });
    }
    
    static warning(title = 'Estas seguro?', text = 'No podras revertir esta acción!', confirmButtonText = 'Si') {
        return new Promise((resolve, reject) => {
            swal({
                title,
                text,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText
            }).then(result => {
                if(result.value) {
                    resolve('done');
                }
            })
        })
    }

    static error(title = 'Oops...', text = 'Ocurrio un error. Intenta nuevamente!', confirmButtonText = 'Ok') {
        return swal({
            title,
            text,
            type: 'error',
            confirmButtonText
        });
    }
}