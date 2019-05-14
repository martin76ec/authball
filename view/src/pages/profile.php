<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('view/src/modules/head.php'); ?>
</head>

<body>
  <header>
    <?php include('view/src/modules/profilenavbar.php'); ?>
    <div class="container-fluid text-center tablediv">
      <?php 
        include('model/connection.php');

        $sql1= "SELECT * FROM log WHERE user_id = ".$_SESSION['user_id'];
        $query = $con->query($sql1);
        $response = $query->fetchAll(PDO::FETCH_ASSOC);
        ?>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-12">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Fecha y Hora</th>
                <th scope="col">País</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Estatus</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                for ($i=0; $i < count($response) - 1; $i++) { 
                  echo "<tr>";
                  echo "<th>".$response[$i]['date']."</th>";
                  echo "<td>".$response[$i]['country']."</td>";
                  echo "<td>".$response[$i]['city']."</td>";
                  echo "<th>".$response[$i]['status']."</th>";
                  echo "</tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </header>
</body>

</html>