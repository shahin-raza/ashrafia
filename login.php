<?php include 'nav_admin.php'; ?>
<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['user_id'])) {
        echo '
        <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        form {border: 3px solid #f1f1f1;}
        
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        
        button:hover {
            opacity: 0.8;
        }
        
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }
        
        img.avatar {
            width: 40%;
            border-radius: 50%;
        }
        
        .container {
            padding: 16px;
        }
        
        span.psw {
            float: right;
            padding-top: 16px;
        }
        </style>';
        if (!empty($_POST['uname'])) {
            if(($_POST['uname']=='admin') && ($_POST['psw']=='admin1234')) {
                $_SESSION['user_id'] = $_POST['uname'];
                header('Location: contact-view.php');
                exit();
            }
        }

        echo '
            <br /> <br /> <br />
            <form action="" name="loginform" method="post">
            <div class="imgcontainer">
                <img src="resources/files/admin.png" alt="admin" height= "200px" width = "100px" class="avatar">
            </div>
            
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
            
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                    
                <button type="submit">Login</button>
            </div>
            </form>';
}
?>

<?php include 'footer.php'; ?>