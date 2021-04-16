$(document).ready(function () {
  var formulario_validado = true;

  $("#inputTarea").bind("change keyup", function () {
    validateInput($("#inputTarea"));
  });

  $("#inputEntregables").bind("change keyup", function () {
    validateInput($("#inputEntregables"));
  });

  $("#inputObservaciones").bind("change keyup", function () {
    validateInput($("#inputObservaciones"));
  });

  function validateInput(htmlObject) {
    var re = new RegExp("^[_A-z0-9 ]*((-|s)*[_A-z0-9 ])*$");
    if (!re.test(htmlObject.val())) {
      htmlObject.addClass("is-invalid");
      formulario_validado = false;
    } else {
      htmlObject.removeClass("is-invalid");
      formulario_validado = true;
    }
  }

  $("#registro_editar").submit(function (event) {
    event.preventDefault();
    if (formulario_validado) {
      $.ajax({
        type: "POST",
        url: "bd/editar-registro.php",
        data: $(this).serialize(),
        dataType: "JSON",
        success: function (data) {
          console.log(data);
          if (data["status"] == true) {
            // registro exitoso, redirecciona
            window.location.href = "gantt.php";
          } else {
            toastr["warning"]("No se ha podido actualizar");
            console.log(data["msg"]);
          }
        },
        error: function (jqXHR, exception, errorThrown) {
          console.log("Error: " + errorThrown);
          toastr["error"]("Hubo un error al actualizar");
        },
      });

    }
  });

  $("#registro").submit(function (event) {
    event.preventDefault();
    console.log($("#registro"));
    if (formulario_validado) {
      $.ajax({
        type: "POST",
        url: "bd/agregar-registro.php",
        data: $(this).serialize(),
        dataType: "JSON",
        success: function (data) {
          console.log(data);
          if (data["status"] == true) {
            // registro exitoso, redirecciona
            window.location.href = "gantt.php";
          } else {
            toastr["warning"]("No se ha podido registrar");
            console.debug(data["msg"]);
          }
        },
        error: function (jqXHR, exception, errorThrown) {
          console.log("Error: " + errorThrown);
          toastr["error"]("Hubo un error al registrar");
        },
      });
    }
  });

  toastr.options = {
    closeButton: false,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "2000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
  };
});
