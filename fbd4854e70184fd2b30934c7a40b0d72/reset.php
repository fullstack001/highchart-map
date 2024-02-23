<?php
    include('./config.php');
    session_start();
    if( $_SESSION['admin'] == 'login'){

        if(isset($_POST['submit-btn'])){
            $passwordFilePath = './csv/password.csv';
            $old_password = $_POST['old_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            if( md5($old_password) !=  $password){
                echo "<script type='text/javascript'>alert('Invalid Old Password. Please input the correct password!');</script>";
            }else{
                if($new_password != $confirm_password){
                    echo "<script type='text/javascript'>alert('New passwords not match. Please match New Password and Confirm Password!');</script>";
                }else{
                    $password_data = array(
                       [md5($new_password)]
                    );
                
                    $password_csv = '';
                    foreach($password_data as $row){
                        $password_csv .= implode(',', $row);
                        file_put_contents($passwordFilePath, $password_csv);
                    }  
                    echo "<script type='text/javascript'>alert('Password Correctly Changed!');</script>";
                }
            }           
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="../assets/img/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="sites.php">Sites</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Reset Password</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log out</a>
                    </li>
                </ul>               
            </div>
            </div>
        </nav>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
    
            <div class="col-6">
                <form action="" method = 'POST'>
                    <div class="form-group mt-2">
                        <label for="old_password"><b>Old Password</b></label>
                        <input type="password" placeholder="Enter Old Password" name="old_password" id = 'old_password' class = 'form-control' required>

                    </div>
                    
                    <div class="form-group mt-3">
                        <label for="new_password"><b>New Password</b></label>
                        <input type="password" placeholder="Enter New Password" name="new_password" id = 'new_password' class = 'form-control' required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="confirm_password"><b>Confirm Password</b></label>
                        <input type="password" placeholder="Enter Confirm Password" name="confirm_password" id = 'confirm_password' class = 'form-control' required>
                    </div>
                        
                    <div class="text-center mt-3">
                        <input type="submit" class = 'btn btn-primary' name = 'submit-btn' value = 'Reset Password'>
                    </div>
                </form>
            </div>


            <div class="col-3"></div>
        </div>
        
    </div>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
<?php
    }else{
        echo('Invalid User. Please login with correct password.');
    }
?>
<script>

</script>