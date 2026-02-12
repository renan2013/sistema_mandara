<?php
// This space is for any future PHP logic.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Cliente</title>
    
    <!-- Using Bootstrap 4 to be consistent with the rest of the project -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- React and Babel for the form -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.2/umd/react.development.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.2/umd/react-dom.development.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>

    <style>
        .titulo {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php
      // Include the standardized menu
      include "../assets/menu.php";
    ?>

    <div class="container">
        <div class="titulo"><h3>Registrar Cliente</h3></div>
        <div id="formulario"></div>
    </div>

    <!-- React Component Script -->
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
            const [Mensaje, setMensaje] = React.useState('');

            const handleChangeFecha = (event) => {
                const fecha = event.target.value;
                const fechaObj = new Date(fecha);
                const mesNumerico = fechaObj.getMonth() + 1;
                setFecha(fecha);
                setMesNumerico(mesNumerico);
            };

            const handleSubmit = (event) => {
                event.preventDefault();
                const formData = new FormData();
                formData.append('fecha', fecha);
                formData.append('mesNumerico', mesNumerico);
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
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    setMensaje(data);
                    setFecha('');
                    setMesNumerico('');
                    setNombre('');
                    setApellido('');
                    setEmail('');
                    setCelular('');
                    setDireccion('');
                    setObservaciones('');
                })
                .catch(error => console.error('Error:', error));
            };

            return (
                <div>
                    {Mensaje && <div class="alert alert-success">{Mensaje}</div>}
                    <form onSubmit={handleSubmit} method="post">
                        <div class="form-group">
                            <label htmlFor="Nombre">Nombre:</label>
                            <input type="text" value={Nombre} onChange={(e) => setNombre(e.target.value)} required id="Nombre" name="Nombre" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label htmlFor="Apellido">Apellidos:</label>
                            <input type="text" value={Apellido} onChange={(e) => setApellido(e.target.value)} id="Apellido" name="Apellido" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label htmlFor="Email">Email:</label>
                            <input type="email" value={Email} onChange={(e) => setEmail(e.target.value)} id="Email" name="Email" class="form-control" />
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
                            <label htmlFor="Celular">Celular:</label>
                            <input type="text" value={Celular} onChange={(e) => setCelular(e.target.value)} id="Celular" name="Celular" class="form-control"/>
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
                        <a href="index.php" class="btn btn-secondary ml-2">Volver</a>
                    </form>
                </div>
            );
        }

        ReactDOM.render(<Formulario />, document.getElementById('formulario'));
    </script>
    
    <?php
      // Include the standardized footer
      include "../assets/footer.php";
    ?>
</body>
</html>