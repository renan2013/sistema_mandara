<!doctype html>
<html lang="en">
  <head>
    <title>Tarjeta de Regalo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <header>
      <!-- place navbar here -->
    </header>
    <main>
      <div class="container">
      <?php
          include "menu.php";
      ?>
    <form action="procesa_cumple_2.php" class="needs-validation" novalidate>
    <div class="mb-3">
      <br/>
        <label for="exampleFormControlSelect1" class="form-label">Seleccione la tarjeta de regalo</label>
        <select class="form-select" id="exampleFormControlSelect1" name="nombreImagen" required>
            <option value="">Seleccione una opción</option>
            <option value="imgs/1.png">Tarjeta 1 </option>
           
         
        </select>
        <div class="invalid-feedback">
            Por favor, seleccione una opción.
        </div>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="texto1" required placeholder="Nombre de cariño">
        <div class="invalid-feedback">
            Por favor, ingrese el nombre.
        </div>
    </div>
    <div class="mb-3">
       
        <textarea class="form-control" id="areaTexto" rows="3" name="texto2"  required placeholder="Mensaje personalizado" maxlength="200"></textarea>

        
        <div class="invalid-feedback">
            Por favor, ingrese el mensaje.
        </div>
    </div>
    <button type="submit" class="btn btn-primary w-100">Preparar tarjeta de regalo</button>
</form>
</div>

    </main>
    <footer>
    <br/><br/>
        <?php
          include "footer.php";
      ?>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

