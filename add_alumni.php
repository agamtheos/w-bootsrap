<?php
    $nim = $password = $ulangi_password = $jenkel = $tgl_lahir = $email = "";
    $errors = array('nim' =>'', 'password' =>'', 'ulangi_password' =>'', 'jenis_kelamin' =>'', 'tanggal_lahir' =>'', 'email' =>'');
    $correct = array('email' =>'');


    if (isset($_POST['submit'])) {
        // echo htmlspecialchars($_POST['nim']);
        // echo htmlspecialchars($_POST['password']);
        // echo htmlspecialchars($_POST['ulangi_password']);
        // echo htmlspecialchars($_POST['jenis_kelamin']);
        // echo htmlspecialchars($_POST['tanggal_lahir']);
        // echo htmlspecialchars($_POST['email']);

        //check NIM
        if(empty($_POST['nim'])){
            $errors['nim'] = 'NIM Anda kosong <br />';
        } else{
            $nim = $_POST['nim'];
            if(!ctype_digit($nim)){
                $errors['nim'] = 'NIM harus berisi angka <br />';
            }
        }
        //check Password
        if(empty($_POST['password'])){
            $errors['password'] = 'Harap masukkan password <br />';
        } else{
            $password = $_POST['password'];
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);
            $specialchars = preg_match('@[^\w]@', $password);
            if(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password) > 12){
                $errors['password'] = 'Password harus berisi maksimal 12 karakter dan minimal 1 huruf kapital, angka, dan special character <br />';
            }
        }
        //check ulang password
        if(empty($_POST['ulangi_password'])){
            $errors['ulangi_password'] = 'Masukkan password kembali <br />';
        } else{
            $ulangi_password = $_POST['ulangi_password'];
            if($_POST['ulangi_password'] != $_POST['password']){
                $errors['ulangi_password'] = 'Password tidak sama <br />';
            }
        }
        //check jenis kelamin
        if(empty($_POST['jenis_kelamin'])){
            $jenkel = $_POST['jenis_kelamin'];
            $errors['jenis_kelamin'] = 'Masukkan Jenis Kelamin yang tersedia <br />';
        }
        //check tanggal lahir
        if(empty($_POST['tanggal_lahir'])){
            $tgl_lahir = $_POST['tanggal_lahir'];
            $errors['tanggal_lahir'] = 'Masukkan tanggal lahir <br ?>';
        }
        // check email
        if(empty($_POST['email'])){
            $errors['email'] = 'Harap masukkan email <br />';
        } else{
            $email = $_POST['email'];
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $correct['email'] = 'email sudah valid';
            }else{
                $errors['email'] = 'email tidak valid';
            }
        }

        if(array_filter($errors)){

        }else{
            header('Location: index.php');
        }
    }    // akhir dari POST check
        
    
        

?>

<!DOCTYPE html>
<html>
<body>
 <?php include('templates/nav.php'); ?>
 <section class="container grey-text">
    <h4 class="center">Isi Data Anda</h4>
    <form class="white" action="add_alumni.php" method="POST">
        <label>Nim:</label>
        <input type="text" name="nim" value="<?php echo htmlspecialchars($nim) ?>">
        <div class="red-text"><?php echo $errors['nim']; ?></div>
        <label>Password:</label>
        <input type="text" name="password" value="<?php echo htmlspecialchars($password) ?>">
        <div class="red-text"><?php echo $errors['password']; ?></div>
        <label>Ulangi Password:</label>
        <input type="text" name="ulangi_password" value="<?php echo htmlspecialchars($ulangi_password) ?>">
        <div class="red-text"><?php echo $errors['ulangi_password']; ?></div>
        <label>Jenis Kelamin:</label>
        <input type="text" name="jenis_kelamin" value="<?php echo htmlspecialchars($jenkel) ?>">
        <div class="red-text"><?php echo $errors['jenis_kelamin']; ?></div>
        <label>Tanggal Lahir:</label>
        <input type="text" name="tanggal_lahir" value="<?php echo htmlspecialchars($tgl_lahir) ?>">
        <div class="red-text"><?php echo $errors['tanggal_lahir']; ?></div>
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>
        <div class="green-text"><?php echo $correct['email']; ?></div>
        <div class="center"><input type="submit" name="submit" value="submit" class="btn brand z-depth-0"></div>    
    </form>
 </section>
 <?php include('templates/footer.php'); ?>


</body>
</html>