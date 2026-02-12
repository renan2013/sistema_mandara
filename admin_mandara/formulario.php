<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// No PHP processing on this page, as React handles form submission via fetch.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nuevo Cliente</title>
    <!-- Consistent Bootstrap 4 and Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .titulo {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .container {
            padding-bottom: 50px; /* Add some space at the bottom */
        }
    </style>
</head>
<body>

<?php 
    include "assets/menu.php"; 
?>

<div class="container mt-4">
    <div class="titulo"><h3>Registrar Cliente</h3></div>
    <div id="formulario"></div>
</div>

<!-- React.js, Babel, and SweetAlert2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.2/umd/react.development.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.2/umd/react-dom.development.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/babel">
    function Formulario() {
        const [fecha, setFecha] = React.useState('');
        const [mesNumerico, setMesNumerico] = React.useState('');
        const [Nombre, setNombre] = React.useState('');
        const [Apellido, setApellido] = React.useState('');
        const [Email, setEmail] = React.useState('');
        const [Celular, setCelular] = React.useState('');
        const [Direccion, setDireccion] = React.useState('');
        const [Observaciones, setObservaciones] = React.useState('');

        const handleChangeFecha = (event) => {
            const selectedDate = event.target.value;
            setFecha(selectedDate);
            if (selectedDate) {
                const dateObj = new Date(selectedDate + 'T00:00:00'); // Add T00:00:00 to avoid timezone issues
                setMesNumerico(dateObj.getMonth() + 1);
            } else {
                setMesNumerico('');
            }
        };

        const handleSubmit = (event) => {
            event.preventDefault();
            const formData = new FormData();
            formData.append('fecha', fecha); // This maps to 'edad' in DB
            formData.append('mesNumerico', mesNumerico); // This maps to 'mes' in DB
            formData.append('Nombre', Nombre);
            formData.append('Apellido', Apellido);
            formData.append('Email', Email);
            formData.append('Celular', Celular);
            formData.append('Direccion', Direccion);
            formData.append('Observaciones', Observaciones);

            fetch('procesar_formulario.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire({
                    icon: data.status === 'success' ? 'success' : 'error',
                    title: data.status === 'success' ? '¡Éxito!' : '¡Error!',
                    text: data.message,
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (data.status === 'success' && result.isConfirmed) {
                        window.location.href = 'lista_clientes.php';
                    }
                });
                
                // Limpiar los campos solo si el registro fue exitoso
                if (data.status === 'success') {
                    setFecha('');
                    setMesNumerico('');
                    setNombre('');
                    setApellido('');
                    setEmail('');
                    setCelular('');
                    setDireccion('');
                    setObservaciones('');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'Ocurrió un error al registrar el cliente.',
                    confirmButtonText: 'Aceptar'
                });
            });
        };

        return (
            <div>
                <form onSubmit={handleSubmit} method="post">
                    <div class="form-group">
                        <label htmlFor="Nombre">Nombre:</label>
                        <input type="text" value={Nombre} onChange={(e) => setNombre(e.target.value)} required id="Nombre" name="Nombre" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label htmlFor="Apellido">Apellidos:</label>
                        <input type="text" value={Apellido} onChange={(e) => setApellido(e.target.value)} required id="Apellido" name="Apellido" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label htmlFor="Email">Email:</label>
                        <input type="email" value={Email} onChange={(e) => setEmail(e.target.value)} required id="Email" name="Email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label htmlFor="Celular">Celular:</label>
                        <input type="text" value={Celular} onChange={(e) => setCelular(e.target.value)} required id="Celular" name="Celular" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label htmlFor="fecha">Fecha de Nacimiento:</label>
                        <input type="date" value={fecha} onChange={handleChangeFecha} id="fecha" name="fecha" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label htmlFor="mesNumerico">Mes (número):</label>
                        <input type="text" value={mesNumerico} readOnly id="mesNumerico" name="mesNumerico" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label htmlFor="Direccion">Dirección:</label>
                        <input type="text" value={Direccion} onChange={(e) => setDireccion(e.target.value)} id="Direccion" name="Direccion" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label htmlFor="Observaciones">Observaciones:</label>
                        <textarea value={Observaciones} onChange={(e) => setObservaciones(e.target.value)} name="Observaciones" id="Observaciones" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Registrar Cliente</button>
                    <a href="lista_clientes.php" class="btn btn-secondary ml-2">Cancelar</a>
                </form>
            </div>
        );
    }

    ReactDOM.render(<Formulario />, document.getElementById('formulario'));
</script>

<?php 
    include "assets/footer.php"; 
?>

</body>
</html>