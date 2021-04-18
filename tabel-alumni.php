<!DOCTYPE html>
<?php include "templates/nav.php"; ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Alumni</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  
<title>Data Alumni</title>
</head>
<body>
<br>
<div class="container-fluid">
	<?php 
		$s_flag="";
        $s_keyword="";
        if (isset($_POST['search'])) {
            $s_flag = $_POST['s_jurusan'];
            $s_keyword = $_POST['s_keyword'];
        }
	?>
	<form method="POST" action="">
        <div class="row mb-3">
		    <div class="col-sm-12"><h4>Cari</h4></div>
		    <div class="col-sm-3">
		        <div class="form-group">
		            <select name="s_jurusan" id="s_jurusan" class="form-control">
		                <option value="">Status Mahasiswa</option>
		                <option value="Sistem Informasi" <?php if ($s_flag=="Sistem Informasi"){ echo "selected"; } ?>>Aktif</option>
		                <option value="Teknik Informatika" <?php if ($s_flag=="Teknik Informatika"){ echo "selected"; } ?>>Tidak Aktif</option>
		            </select>
		        </div>
		    </div>
		    <div class="col-sm-4">
		        <div class="form-group">
		            <input type="text" placeholder="Nama Mahasiswa" onkeyup="myFunction()" name="s_keyword" id="s_keyword" class="form-control" value="<?php echo $s_keyword; ?>">
		        </div>
		    </div>
		    <div class="col-sm-4" >
		        <button id="search" name="search" class="btn btn-warning">Cari</button>
		    </div>
		</div>
	</form>

<br><br><br>
    <div class="container-fluid">

    
        <table id="myTable" class="table table-striped">        
            <thead>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Warga Negara</th>
                    <th>Status Perkawinan</th>
                    <th>IPK</th>
                    <th>Status Mahasiswa</th>      
            </thead>
            <tbody>
                <?php
                include "config/db_connect.php";   
                $sqll = "SELECT * FROM alumni WHERE jenkel='p'";             
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
                        <td>".$row['ipk']."</td>
                        <td>".$row['flag']."</td>
                        </tr>";
                }
                ?>
            </tbody> 
        </table>
    </div>    
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    } );
</script>
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("s_keyword");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<?php include "templates/footer.php"; ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
</body>
</html>