<?php
include '../inc/function.inc.php';
include '../config.php';
if(!isset($_GET['u'])){
    redirect('reg.php');
}else{
    $id = $_GET['u'];
}
if(isset($_POST['submit'])){
    // var_dump($_POST);
    // $id = $_POST['id'];
    // $otp = $_POST['otp'];
    // $sql = "select * from recruiter where id = $id";
    // $res = mysqli_query($con, $sql);
    // print_r($res);
    // $data = mysqli_fetch_assoc($res);
    // $count = mysqli_num_rows($res);
    // echo $count;
    // if($count>0){
    //     $update = "update recruiter set otp = '', status = '1' where id ='$id'";
    //     $update_query = mysqli_query($con, $update);
    //     redirect('login.php');
    // }else{
    //     echo 'OTP is not correct please try again';
    // }

    $select = "select * from recruiter where id = $id";
    $select_qurey = mysqli_query($con, $select);
    $result = mysqli_fetch_assoc($select_qurey);
    // var_dump($result);
    $db_otp = $result['otp'];

    $otp = $_POST['otp'];
    if($db_otp == $otp){
        $update = " update recruiter set otp = '', status = '1' where id= $id";
        $update_query = mysqli_query($con, $update);
        redirect('login.php');
    }else{
        echo 'Your OTP is not correct please try again';
        // header('location:otp.php');
    }

}

?>

<form action="" method="post">
    <input type="text" name="otp" placeholder="Enter your otp here">
    <!-- <input type="hidden" name="id" value="<?php //echo $id ?>"> -->
    <button type="submit" name="submit">Verify</button>
</form>
