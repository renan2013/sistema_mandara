<?php
$conexion = new mysqli('localhost', 'u852886994_mandara', 'Mandara2023', 'u852886994_mandara');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Combos dependientes Demo</title>
<meta name="description" content="Combos dependientes - Ejemplo de marcas y modelos sacados de una base de datos de Jose Aguilar."/>
<meta name="author" content="Jose Aguilar">
<link rel="shortcut icon" href="https://www.jose-aguilar.com/blog/wp-content/themes/jaconsulting/favicon.ico" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script language="javascript">
$(document).ready(function(){
    $("#category").on('change', function () {
        $("#category option:selected").each(function () {
            var id_category = $(this).val();
            $.post("subcategories.php", { id_category: id_category }, function(data) {
                $("#subcategory").html(data);
            });			
        });
   });
});
</script>
</head>

<body>

<div class="container">
    
    
    <div class="row">
        <div id="content" class="col-lg-12">
            <form class="row" action="" method="post">
                <div class="form-group col-lg-3">
                    <label for="category">Marca</label>
                    <select name="category" id="category" class="form-control">
                        <?php
                        $result = $conexion->query(
                            "SELECT c.id_category, name FROM ps_category c
                            LEFT JOIN ps_category_lang cl ON (cl.id_category = c.id_category AND cl.id_lang = 1)
                            WHERE id_parent = 2 ORDER BY name ASC"
                        );
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {                
                                echo '<option value="'.$row['id_category'].'">'.$row['name'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <label for="subcategory">Modelo</label>
                    <select name="subcategory" id="subcategory" class="form-control"></select>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Bloque de anuncios adaptable -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-6676636635558550"
                 data-ad-slot="8523024962"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
    
    

    
    
</div>

</body>
</html>
