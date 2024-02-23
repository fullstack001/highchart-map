<?php
    session_start();
    include('./config.php');

    if(isset($_POST['password'])){
        if(md5($_POST['password']) == $password){           
            $_SESSION['admin'] = 'login';
         
            // $url = "https://64.227.74.131/admin/sites.php";

            $url = "http://" . $_SERVER['SERVER_NAME'] . '/fbd4854e70184fd2b30934c7a40b0d72/'.'sites.php';
            
            header('Location:'.$url);
            exit();
            
        }else{
            echo "<script type='text/javascript'>alert('Invalid Password. Please input the correct password!');</script>";
            echo "<script type='text/javascript'>window.history.back();</script>";
            
            $_SESSION['admin'] = 'false';
        }
    }else{

    
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./main.css">
</head>
<body>

    <div class='loginArea'>
        <h2>Please Login Admin Panel With Your Password</h2>
        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
    </div>


    <div id="id01" class="modal">    
        <form class="modal-content animate" action="" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        
            </div>

            <div class="container">
            
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                
                <button type="submit">Login</button>
                
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>       
            </div>
        </form>
    </div>

<?php
    }
?>
<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>