<!-- PHP -->
<?php
include('../../services/LoginService.class.php');

$errorMsgLogin = '';

if (isset($_POST['Login'])) {
    //echo "Submit clicked and being processed <br/>";
    if ($_POST['email'] != "" && $_POST['password'] != "") {
        $LoginService = new LoginService();
        $validateEmail = $LoginService -> validatePassword($_POST['email'], $_POST['password']);
        //echo "Validate Email: " . $validateEmail . "<br/>";
        var_dump($validateEmail);
        if ($validateEmail) {
            $_SESSION['userID'] = $validateEmail;
            //echo "You will be redirect to admin home page";
            header('Location: home.php');
        } else {
            //echo "Incorrect Credentials";
            $errorMsgLogin = "Incorrect email and password combination";
            header('Location: login.php');
        }
    } else {
        echo "Please enter an email and password";
    }
}

?>

<!-- HTML -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/admin/home.css" type="text/css">
</head>
<body>
<div id="login">
    <h3>Login</h3>

    <form method="post" action="" name="login">

        <label>Email</label>
        <input type="email" name="email" autocomplete="off"/>

        <label>Password</label>
        <input type="password" name="password" autocomplete="off"/>

        <div class="errorMsg"><?php echo $errorMsgLogin; ?></div>

        <button type="Login" class="button" name="Login" value="Login">Login</button>
    </form>

</div>
</body>
</html>

