<?php
global $con;
$con=mysqli_connect('localhost', 'root', 'Root123!', 'task_manager');
if (!$con) die ("failed".mysqli_error());

function getTable(){
    global $con;
    $query="select * from user";
    $result=mysqli_query($con, $query);
    $result=mysqli_fetch_all($result, 1);
    return $result;
}
function getSpecInfo($select, $where, $what){
    global $con;
    $query="select $select from user where $where='$what'";
    $result=mysqli_query($con, $query);
    $result=mysqli_fetch_all($result, 1);
    return $result;
}
