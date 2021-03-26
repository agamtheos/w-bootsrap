<?php

  include('config/db_connect.php'); 

  if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    $sql = "DELETE FROM perusahaan WHERE idPerush = $id_to_delete";
    if(mysqli_query($conn, $sql)){
      //sukses
      header('Location: index.php');
    } else{
      //erorr
      echo "query error: " . mysqli_error($conn);
    }

  }

  //check get request idPerush
  if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM perusahaan WHERE idPerush = $id";
    $result = mysqli_query($conn, $sql);
    $perusahaan = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
    // print_r($perusahaan);
  }

?>

<!DOCTYPE html>
<html lang="en">

  <?php include('templates/header.php'); ?>

  <div class="container center">
    <?php if($perusahaan): ?>

      <h4><?php echo htmlspecialchars($perusahaan['namaPerush']); ?></h4>
      <p>Created by: <?php echo htmlspecialchars($perusahaan['emailPerush']); ?></p>
      <p>Alamat: <?php echo htmlspecialchars($perusahaan['alamatPerush']); ?></p>
      <p>Telp/Fax: <?php echo htmlspecialchars($perusahaan['telpFaxPerush']); ?></p>
      <p>Tentang Perusahaan: <?php echo htmlspecialchars($perusahaan['tentangPerush']); ?></p>
    
      <!-- UPDATE FORM -->
      <ul id="navmobile" class="center hide-on-small-and-down">
        <li><a href="update.php" class="btn green z-depth-0">Edit</a></li>
      </ul>

      <!-- DELETE FORM -->
      <form action="details.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $perusahaan['idPerush'] ?>">
        <input type="submit" name="delete" value="Delete" class="btn red z-depth-0">
      </form>

    <?php else: ?>
    <?php endif; ?>
  </div>


  <?php include('templates/footer.php'); ?>

</html>