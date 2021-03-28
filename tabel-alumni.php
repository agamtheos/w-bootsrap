<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Alumni</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css">
  <script src="main.js"></script>
  <title>Document</title>
</head>
<body>

    <table>
        <tr>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Warga Negara</th>
            <th>Status Perkawinan</th>
            <th>Status Mahasiswa</th>      
        </tr>
        <?php
        include "config/db_connect.php";
        $sql = "SELECT * FROM alumni";
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_array($result)){
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
    
    </table>


</body>
</html>