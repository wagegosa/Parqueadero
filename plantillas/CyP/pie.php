<!-- LIBRERIAS validadoras-->
	<script src="<?php echo $url_completa;?>css/assets/js/plugins/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?php echo $url_completa;?>css/assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- Plugin para la validación de formularios -->
  <script src="<?php echo $url_completa;?>css/assets/jquery_validation/dist/jquery.validate.min.js"></script>
  <script src="<?php echo $url_completa;?>css/assets/jquery_validation/dist/localization/messages_es.js"></script>
  <!-- Plugin para listado, navegación y filtrado en tablas -->
  <script src="<?php echo $url_completa;?>css/assets/footable/js/footable.min.js"></script>
  <script src="<?php echo $url_completa;?>css/assets/footable/js/configTable.js"></script>
  <!-- Plugin para cuadro de selección personalizable con soporte para búsqueda. -->
  <script src="<?php echo $url_completa;?>js/plugins/select2/select2.full.js"></script>
  <script src="<?php echo $url_completa;?>js/plugins/select2/es.js"></script>
    <script>
    $(document).ready(function() {
      $("#frm").validate({
        rules: {
          pregunta: {required: true, minlength: 2, maxlength: 255},
          estado: { required: true},
        }
      })
    });
  </script>
  <!-- Listado -->
  <script>
    function myFunction() {
      // Declare variables 
      var input, filter, table, tr, td, i, j, visible;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        visible = false;
        /* Obtenemos todas las celdas de la fila, no sólo la primera */
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
          if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
            visible = true;
          }
        }
        if (visible === true) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  </script>
