<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Compra</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    
    <form id="miFormulario" action="guardar_datos.php" method="post">
        
        
        <!-- Detalles del Producto -->
        <div class="card mb-3">
            <div class="card-header">Tienda Mandara</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="producto">Producto:</label>
                    <input type="text" class="form-control" id="producto" name="producto">
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" value="1">
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" class="form-control" id="precio" name="precio" min="0" step="0.01">
                </div>
                <div class="form-group">
                    <label for="total">Total:</label>
                <input type="text" class="form-control" id="total" name="total" readonly>
            </div>
            </div>
        </div>
        
        <!-- Campo de Total -->
       
     
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // Función para calcular el total
        function calcularTotal() {
            var cantidad = $('#cantidad').val();
            var precio = $('#precio').val();
            var total = cantidad * precio;
            $('#total').val(total.toFixed(2));
        }

        // Al cambiar la cantidad o el precio, calcular el total
        $('#cantidad, #precio').on('input', calcularTotal);
    });
</script>

</body>
</html>
