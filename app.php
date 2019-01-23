<?php


$con = mysqli_connect('localhost', 'root', 'Root123!', 'task_manager');
if (!$con) die('Failed'.mysqli_error());
//$query = mysqli_query($con, "select * from user");
//$result = mysqli_fetch_all($query, 1);
//if($_GET['username']==)
//print_r($result);
//foreach ($result as $user) {
//    foreach ($user as $column => $value) {
//        print_r("$column = $value \n");
//    }
//}
//mysqli_close($con);
if (isset($_POST['submit'])){
    require_once 'just.php';
    $username=$_POST['username'];
    $result=getSpecInfo(user_name, user_name, $username);
    if (!$result){
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        if ($_POST['password']==$_POST['password2']){
            $password=$_POST['password'];
            $age=$_POST['age'];
            $query="INSERT INTO user (user_name, password, first_name, last_name, age) values ('$username', '$password', '$name', '$surname', '$age')";
            mysqli_query($con, $query);
            echo 'User has been created successfully ';
        }else echo 'Passwords dont match';

    }else echo 'This username is already used, try another one';

}

if (isset($_POST['logIn'])){
    $username=$_POST['username'];
    require_once 'just.php';
    $res = getSpecInfo(password, user_name, $username);
    if ($res) {
        if ($res[0]['password']==$_POST['password']){
            echo 'logged in   ';
            print_r(getTable());
        }else echo 'wrong password';
    }else echo 'There is not such username, sign up';
}
mysqli_close($con);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        #reg input{
            /*display:block;*/
        }
        body{
            background-color: powderblue;
        }
    </style>
    <title>Document</title>
</head>
<body>
<div>
    <h1>Log in</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="signName">Name</label>
        <input type="text" name="username" id="signName">
        <label for="signPassword">Password</label>
        <input type="password" name="password" id="signPassword">
        <input type="submit" value="Log in" name="logIn">
    </form>
    <h2></h2>
</div>
<div id="reg">
    <h1>Sign up</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ;?> " method="post">
        <label for="userName">Username</label>
        <input type="text" name="username" id="userName"><br>
        <label for="name">Name</label>
        <input type="text" id="name" name="name"><br>
        <label for="surname">Surname</label>
        <input type="text" id="surname" name="surname"><br>
        <label for="age">Age</label>
        <input type="number" name="age"><br>
        <label for="gender">Gender</label>
        <input type="text" id="gender" name="gender"><br>
        <label for="password">Password</label>
        <input type="password" name="password"><br>
        <label for="password2">Repeat password</label>
        <input type="password2" name="password2"><br>


        <input type="submit" name="submit" value="Sign up">
    </form>
</div>
</body>
</html>
