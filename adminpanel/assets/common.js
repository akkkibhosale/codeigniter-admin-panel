 var Toast = Swal.mixin({
      // toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    function swalAlert(type,title,toast){
      Toast.fire({
        icon: type,
        title: title,
         toast: toast,
      })
    }

