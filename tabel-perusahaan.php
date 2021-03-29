<!DOCTYPE html>
<?php include "templates/header.php"; ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
    $('#example').DataTable();
    } );
  </script>
</head>
<body>
    <div class="container">
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Perusahaan</th>
                    <th>Alamat Perusahaan</th>
                    <th>Telp/Fax Perusahaan</th>
                    <th>Email Perusahaan</th>
                    <th>Tentang Perusahaan</th>
                </tr>
            </thead>
            <tbody>
                  <?php include "config/db_connect.php";
                  $sql = "SELECT * FROM perusahaan";
                  $result = mysqli_query($conn, $sql);

                  while($row = mysqli_fetch_array($result)){

                      echo"<tr>
                           <td>".$row['namaPerush']."</td>
                           <td>".$row['alamatPerush']."</td>
                           <td>".$row['telpFaxPerush']."</td>
                           <td>".$row['emailPerush']."</td>
                           <td>".$row['tentangPerush']."</td>
                           </tr>";
                  }
                  ?>
            </tbody>
        </table>
      </div>
<?php include "templates/footer.php"; ?>
</body>
</html>