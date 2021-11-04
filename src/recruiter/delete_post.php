<?php
session_start();
include '../config.php';
include '../inc/function.inc.php';
if(isset($_GET['p'])){
$post_id = $_GET['p'];
if(isset($_SESSION['id'])){
    $req_id = $_SESSION['id'];
    isValidRecruiter($con,$req_id, 'logout.php');

    $checkSql = "select * from post where id = $post_id and recruiter_id = $req_id";
    $checkQuery = mysqli_query($con, $checkSql);
    if(mysqli_num_rows($checkQuery)<1){
    redirect('index.php');
    }else{
        $sql = "DELETE FROM post WHERE id = $post_id";
        $query = mysqli_query($con, $sql);
        redirect('index.php');
    }
}
}else{
    redirect('index.php');
}
?>