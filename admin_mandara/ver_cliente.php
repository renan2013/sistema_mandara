<?php
include 'funciones';
require_once 'dbconfig.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $stmt_edit = $DB_con->prepare('SELECT * FROM alumnos  WHERE id =:uid ');

  $stmt_edit->execute(array(':uid' => $id));
  $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
  extract($edit_row);
} else {
  header("Location:");
}
?>




  <div class="container">
  <h3 class="mt-5 mb-3"><?php echo $nombre?></h3>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b><?php echo $nombre; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p><b><?php echo $edad;?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <p><b><?php echo $email;?></b></p>
  </div>

  </div>



        



          <div class="sidebar-item recent-posts">

            <?php
            $stmt = $DB_con->prepare("SELECT * FROM citas WHERE id=$id");
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
            ?>

                <div class="row">
                  

                  <?php echo $fecha; ?>

                </div>
              <?php
              }
            } else {
              ?>
              <div class="col-xs-12">
                <span class="glyphicon glyphicon-info-sign"></span>
              </div>
            <?php
            }
            ?>
            <hr />





          </div><!-- End sidebar recent posts-->



