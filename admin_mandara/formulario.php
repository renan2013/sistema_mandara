<?php include 'templates/header.php'; ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con React</title>
    <style>
        .titulo{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php include '../sistema_obsequios/menu.php'; ?>
    <div class="titulo"><h3>Registrar Cliente</h3></div>
    </div>
    <div id="formulario"></div>

    <!-- React.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.2/umd/react.development.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.2/umd/react-dom.development.js"></script>

    <!-- Babel para transpilar JSX -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <script type="text/babel">
        // Componente del formulario
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
                    setMensaje(data); // Mostrar mensaje en el estado
                    // Limpiar los campos después de enviar el formulario y mostrar el mensaje
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
                <div class="container">
                
                    {Mensaje && <p>{Mensaje}</p>} {/* Mostrar el mensaje si está presente */}
                    <form onSubmit={handleSubmit} method="post" encType="multipart/form-data" action="procesar_formulario.php" id="formulario">
                        <div class="form-group">
                            <label htmlFor="Nombre">Nombre:</label>
                            <input type="text" value={Nombre} onChange={(e) => setNombre(e.target.value)} required id="Nombre" name="Nombre" class="form-control"  />
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
                            <label htmlFor="fecha">Fecha:</label>
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
                            <label htmlFor="Direccion">Direccion:</label>
                            <input type="text" value={Direccion} onChange={(e) => setDireccion(e.target.value)} id="Direccion" name="Direccion" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label htmlFor="Observaciones">Observaciones:</label>
                            
                            <textarea type="text" value={Observaciones} onChange={(e) => setObservaciones(e.target.value)} name="Observaciones" id="Observaciones" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Registrar Cliente</button>
                    </form>
                </div>
            );
        }

        // Renderiza el componente del formulario
        ReactDOM.render(<Formulario />, document.getElementById('formulario'));
    </script>
</body>
</html>
