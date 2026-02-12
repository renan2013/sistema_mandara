

<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Data Mandara</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.2/umd/react.development.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.2/umd/react-dom.development.js"></script>

    <!-- Babel para transpilar JSX -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
      body{
        background-color: #FAFAFA;
      }
      #tabla{
        background-color: white;
      }
    </style>
    <!--Incluir la librería jQuery-->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
 
 <!--Llamada al evento Change del selector Países-->
 <script language="javascript">
 $(document).ready(function(){
     $("#pais").on('change', function () {
         $("#pais option:selected").each(function () {
             paiselegido=$(this).val();
             $.post("buscarciudades.php", { paiselegido: paiselegido }, function(data){
                 $("#ciudad").html(data);
             });         
         });
    });
 });
 </script>


   
  
  </head>
  <body>
  </body>
</html>