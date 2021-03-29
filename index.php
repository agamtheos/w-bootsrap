<?php
    
    include('config/db_connect.php');

    // write query
    $sql = 'SELECT idPerush, namaPerush, alamatPerush, telpFaxPerush, emailPerush, tentangPerush FROM perusahaan';

    // make query and get result
    $result = mysqli_query($conn, $sql);

    // ambil row hasil ke array
    $perusahaans = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // free result
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);
    // print_r($perusahaans); 

    $extras = array('Alamat : ', 'Telp/Fax : ', 'Email : ', 'Tentang Perusahaan : ');


?>

<!DOCTYPE html>
<html>
<body>
 <?php include('templates/header.php'); ?>

 <h4 class="center grey-text">List perusahaan</h4>

 <div class="container">
    <div class="index">
    
        <?php foreach($perusahaans as $perusahaan): ?>
              

            <div class="col s7 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h5 class="center blue-text"><?php echo htmlspecialchars($perusahaan['namaPerush']); ?></h5>
                        <div class="left-align"><?php echo $extras[0]; echo htmlspecialchars($perusahaan['alamatPerush']); ?></div>
                        <div class="left-align"><?php echo $extras[1]; echo htmlspecialchars($perusahaan['telpFaxPerush']); ?></div>
                        <div class="left-align"><?php echo $extras[2]; echo htmlspecialchars($perusahaan['emailPerush']); ?></div>
                        <div class="left-align"><?php echo $extras[3]; echo htmlspecialchars($perusahaan['tentangPerush']); ?></div>
                    </div>
                        <div class="card-action right-align">
                            <a class="brand-text" href="details.php?id=<?php echo $perusahaan['idPerush']?>">info selengkapnya</a>
                        </div>  
                </div>
            </div>


        <?php  endforeach; ?>

    </div>
 </div>

 <?php include('templates/footer.php'); ?>



</body>
</html>