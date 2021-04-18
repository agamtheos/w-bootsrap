<!DOCTYPE html>
<?php include "templates/nav.php"; ?>
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
		                <option value="">Info Perusahaan</option>
		                <option value="Sistem Informasi" <?php if ($s_flag=="Sistem Informasi"){ echo "selected"; } ?>>Aktif</option>
		                <option value="Teknik Informatika" <?php if ($s_flag=="Teknik Informatika"){ echo "selected"; } ?>>Tidak Aktif</option>
		            </select>
		        </div>
		    </div>
		    <div class="col-sm-4">
		        <div class="form-group">
		            <input type="text" placeholder="Nama Perusahaan" onkeyup="myFunction()" name="s_keyword" id="s_keyword" class="form-control" value="<?php echo $s_keyword; ?>">
		        </div>
		    </div>
		    <div class="col-sm-4" >
		        <button id="search" name="search" class="btn btn-warning">Cari</button>
		    </div>
		</div>
	</form>
    <div class="container-fluid">
        <table id="myTable" class="table table-striped">
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
</body>
</html>