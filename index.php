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
 <?php include('templates/nav.php'); ?>

 <h4 class="center black-text">Selamat Datang</h4>
 

    <div class="container">
        <class="index">
        
                

                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title-center">Alumni</h5>
                                <p class="card-text">Untuk melihat daftar alumni</p>
                                <a href="tabel-alumni.php" class="btn btn-primary">Alumni</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title-center">Lowongan</h5>
                                <p class="card-text">Untuk Mencari Lowongan</p>
                                <a href="#" class="btn btn-primary">Lowongan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title-center">Perusahaan</h5>
                                <p class="card-text">Untuk melihat daftar Perusahaan</p>
                                <a href="tabel-perusahaan.php" class="btn btn-primary">Perusahaan</a>
                            </div>
                        </div>
                    </div>
                </div>
            


        </class=>
    </div>

 <?php include('templates/footer.php'); ?>



</body>
</html>