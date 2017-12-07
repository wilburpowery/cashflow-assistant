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
}