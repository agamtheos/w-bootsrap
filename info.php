<?php

    include('config/db_connect.php');

    // $sql = 'SELECT idPerush, namaPerush, alamatPerush, telpFaxPerush, emailPerush, tentangPerush FROM perusahaan';
    SELECT nim, nama, jenkel, tmpLahir, alamat_skrg FROM alumni WHERE flag=’1’;
    $sql = 'SELECT perusahaan.namaPerush, perusahaan.alamatPerush,  perusahaan_lowongan.pesan_ke_pelamar, application.idLowongan, application.tgl_apply, alumni.nim, alumni.nama, alumni.ipk, alumni.kompetensi FROM perusahaan INNER JOIN perusahaan_lowongan  ON perusahaan.idPerush = perusahaan_lowongan.idPerush INNER JOIN application ON perusahaan.idPerush = application.idPerush INNER JOIN alumni ON application.nim = alumni.nim';
    $result = mysqli_query($conn, $sql);
    $infos = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);

    $extras = array('Nama : ', 'NIM : ', 'IPK : ', 'Kompetensi : ', 'tgl_apply : ', 'pesan_ke_pelamar : ');

?>

<!DOCTYPE html>
<html>
<body>

 <?php include('templates/header.php'); ?>

 <h4 class="center grey-text">List Lamaran</h4>

 <div class="container">
    <div class="index">
    
        <?php foreach($infos as $info): ?>
              

            <div class="col s7 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h5 class="center blue-text"><?php echo htmlspecialchars($info['namaPerush']); ?></h5>
                        <div class="left-align"><?php echo $extras[0]; echo htmlspecialchars($info['nama']); ?></div>
                        <div class="left-align"><?php echo $extras[1]; echo htmlspecialchars($info['nim']); ?></div>
                        <div class="left-align"><?php echo $extras[2]; echo htmlspecialchars($info['ipk']); ?></div>
                        <div class="left-align"><?php echo $extras[3]; echo htmlspecialchars($info['kompetensi']); ?></div>
                        <div class="left-align"><?php echo $extras[4]; echo htmlspecialchars($info['tgl_apply']); ?></div>
                        <div class="left-align"><?php echo $extras[5]; echo htmlspecialchars($info['pesan_ke_pelamar']); ?></div>
                    </div>
                        <div class="card-action right-align">
                            <a class="brand-text" href="">ID Lowongan <?php echo htmlspecialchars($info['idLowongan']); ?></a>
                        </div>  
                </div>
            </div>


        <?php  endforeach; ?>

    </div>
 </div>

 <?php include('templates/footer.php'); ?>



</body>
</html>