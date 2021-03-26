<?php

  include('config/db_connect.php');
    $idPerush = $namaPerush = $alamatPerush = $telpfaxperush = $email = $nama = $telp = $tentangPerush = $password = '';
    $errors = array('idPerush' =>'', 'namaPerush' =>'', 'alamatPerush' =>'', 'telpFaxPerush' =>'', 'emailPerush' =>'', 'namaCp' =>'', 'telpCp' =>'', 'tentangPerush' =>'', 'passwordPerush' => '');
    $correct = array('emailPerush' =>'');


    if (isset($_POST['update'])) {
       

        
        //check namaPerush
        $namaPerush = $_POST['namaPerush'];
        if(empty($namaPerush)){
            $errors['namaPerush'] = 'Nama perusahaan Anda kosong <br />';
        }else{
            $namaPerush = $_POST['namaPerush'];
        }
        //check alamatPerush
        $alamatPerush = $_POST['alamatPerush'];
        if(empty($alamatPerush)){
            $errors['alamatPerush'] = 'Harap masukkan alamat perusahaan Anda <br />';
        } else{
            $alamatPerush = $_POST['alamatPerush'];
            
        }
        //check telp/fax
        $telpfaxperush = $_POST['telpFaxPerush'];
        if(empty($telpfaxperush)){  
            if(!ctype_digit($telpfaxperush)){
            $errors['telpFaxPerush'] = 'Telephone/Fax harus berisi angka <br />';
            }else{
                $telpfaxperush = $_POSTp['telpFaxPerush'];
            }
            
        }
        //check email
        $email = $_POST['emailPerush'];
        if(empty($email)){
            $errors['emailPerush'] = 'Harap masukkan email <br />';
        } else{
            $email = $_POST['emailPerush'];
            if(filter_var($_POST['emailPerush'], FILTER_VALIDATE_EMAIL)){
                $correct['emailPerush'] = 'email sudah valid';
            }else{
                $errors['emailPerush'] = 'email tidak valid';
            }
        }
        // check nama
        $nama = $_POST['namaCp'];
        if(empty($nama)){
            $errors['namaCp'] = 'Harap masukkan nama Anda <br />';
        }else {
            $nama = $_POST['namaCp'];
        }
        // check telp
        $telp = $_POST['telpCp'];
        if(empty($telp)){
            $errors['telpCp'] = 'Masukkan No Telephone';
        }else{
            if(!ctype_digit($telp)){
                $errors['telpCp'] = 'Telephone harus berisi angka <br />';
                }
        }

        // check tentang perush
        $tentangPerush = $_POST['tentangPerush'];
        if(empty($tentangPerush)){
            $errors['tentangPerush'] = "Isi informasi mengenai perusahaan Anda";
        }
        
        // check password
        $password = $_POST['passwordPerush'];
        if(empty($_POST['passwordPerush'])){
            $errors['passwordPerush'] = 'Harap masukkan password <br />';
        } else{
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);
            $specialchars = preg_match('@[^\w]@', $password);
            if(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password) > 12){
                $errors['passwordPerush'] = 'Password harus berisi maksimal 12 karakter dan minimal 1 huruf kapital, angka, dan special character <br />';
            }
            
        }
        // print_r($_POST);
        // exit;

        if(array_filter($errors)){
            // tampilkan error di form
        }else{
            

            $namaPerush = mysqli_real_escape_string($conn, $_POST['namaPerush']);
            $alamatPerush = mysqli_real_escape_string($conn, $_POST['alamatPerush']);
            $telpfaxperush = mysqli_real_escape_string($conn, $_POST['telpFaxPerush']);
            $email = mysqli_real_escape_string($conn, $_POST['emailPerush']);
            $nama = mysqli_real_escape_string($conn, $_POST['namaCp']);
            $telp = mysqli_real_escape_string($conn, $_POST['telpCp']);
            $tentangPerush = mysqli_real_escape_string($conn, $_POST['tentangPerush']);
            $password = mysqli_real_escape_string($conn, $_POST['passwordPerush']);

            // memasukkan input data ke db
            $sql = "UPDATE perusahaan SET namaPerush='$namaPerush', alamatPerush='$alamatPerush', telpFaxPerush='$telpfaxperush', emailPerush='$email', namaCp='$nama', telpCp='$telp', tentangPerush='$tentangPerush', passwordPerush='$password'";
            
            // simpan ke db dan cek
            if(mysqli_query($conn, $sql)){
                //sukses
                header('Location: index.php');
            } else{
                //gagal
                echo 'query error: ' . mysqli_error($conn);
            }
            
        }
        // akhir dari POST check
}

?>


<!DOCTYPE html>
<html>
<body>
 <?php include('templates/header.php'); ?>
 <section class="container grey-text">
    <h4 class="center">Isi Data Anda</h4>
    <form class="white" action="update.php" method="POST">
        <label>Nama Perusahaan:</label>
        <input type="text" name="namaPerush" value="<?php echo htmlspecialchars($namaPerush) ?>">
        <div class="red-text">
            <?php echo $errors['namaPerush']; ?>
        </div>
        <label>Alamat Perusahaan:</label>
        <input type="text" name="alamatPerush" value="<?php echo htmlspecialchars($alamatPerush) ?>">
        <div class="red-text">
            <?php echo $errors['alamatPerush']; ?>
        </div>
        <label>Telp/Fax Perusahaan:</label>
        <input type="text" name="telpFaxPerush" value="<?php echo htmlspecialchars($telpfaxperush) ?>">
        <div class="red-text">
            <?php echo $errors['telpFaxPerush']; ?>
        </div>
        <label>Email:</label>
        <input type="text" name="emailPerush" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text">
            <?php echo $errors['emailPerush']; ?>
        </div>
        <div class="green-text">
            <?php echo $correct['emailPerush']; ?>
        </div>
        <label>Nama:</label>
        <input type="text" name="namaCp" value="<?php echo htmlspecialchars($nama) ?>">
        <div class="red-text">
            <?php echo $errors['namaCp']; ?></div>
        <label>Telp</label>
        <input type="text" name="telpCp" value="<?php echo htmlspecialchars($telp) ?>">
        <div class="red-text">
            <?php echo $errors['telpCp']; ?>
        </div>
        <label>Tentang Perusahaan</label>
        <input type="text" name="tentangPerush" value="<?php echo htmlspecialchars($tentangPerush) ?>">
        <div class="red-text">
            <?php echo $errors['tentangPerush']; ?>
        </div>
        <label>Password</label>
        <input type="text" name="passwordPerush" value="<?php echo htmlspecialchars($password) ?>">
        <div class="red-text">
            <?php echo $errors['passwordPerush']; ?>
        </div>
        <div class="center">
            <input type="submit" name="update" value="update" class="btn green z-depth-0">
        </div>    
    </form>
 </section>
 <?php include('templates/footer.php'); ?>


</body>
</html>