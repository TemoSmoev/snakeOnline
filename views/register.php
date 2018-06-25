<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="/snake/templates/css/user.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php if(User::checkLogged()){
    echo $_SESSION['user'];
} ?>

<?php if (isset($errors)){
 foreach ($errors as $error){
     echo $error;
 }
}
?>



<div id="form-div">
    <h3 id="welcome">welcome to the greates game on world</h3>

    <form method="POST">
        <div class="form-group">
            <label for="exampleInputUsername1">Username</label>
            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Enter username" name="username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword2">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Repeat the password" name="password2">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-success" href="/snake"> already have an account?</a>
    </form>
</div>

</body>
</html>