<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Alumni</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <title>Document</title>
</head>
<body>

    <div class="container">

        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Warga Negara</th>
                    <th>Status Perkawinan</th>
                    <th>Status Mahasiswa</th>      
                </tr>
            </thead>
            <tbody>
                <?php
                include "config/db_connect.php";
                
                $sql = "SELECT * FROM alumni";
                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_array($result)){
                    if($row['flag'] == 0){
                        $row['flag'] = "Tidak Aktif";
                    } else{
                        $row['flag'] = "Aktif";
                    }
                    if($row['jenkel'] == "p"){
                        $row['jenkel'] = "Perempuan";
                    } else{
                        $row['jenkel'] = "Laki-Laki";
                    }
                    echo "<tr>
                    <td>".$row['nama']."</td>
                    <td>".$row['jenkel']."</td>
                    <td>".$row['alamat_skrg']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['wn']."</td>
                    <td>".$row['statusMarital']."</td>
                    <td>".$row['flag']."</td>
                    </tr>";
                }

                ?>
            </tbody> 
        
        </table>
    </div>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
    } );
</script>

</body>
</html>