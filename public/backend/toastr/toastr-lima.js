

  // Configuração do Toastr (opcional)
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right", // Posição da notificação na tela
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "2000", // Tempo que a notificação ficará visível em milissegundos
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
    "tapToDismiss": false
  };
//console.log("Ficioadooo TOASTR "+ toastr.error);
  // Exemplo de uso: exibe uma notificação de sucesso
  // toastr.error('Notificação de sucesso!', 'Título da notificação' );
