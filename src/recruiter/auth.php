<?php
include '../inc/function.inc.php';
include '../config.php';
if(!isset($_GET['u'])){
    redirect('reg.php');
}else{
    $id = $_GET['u'];
}
if(isset($_POST['submit'])){
    $select = "select * from recruiter where id = $id";
    $select_qurey = mysqli_query($con, $select);
    $result = mysqli_fetch_assoc($select_qurey);
    $db_otp = $result['otp'];
    $otp = $_POST['otp'];
    if($db_otp == $otp){
        $update = " update recruiter set otp = '', status = '1' where id= $id";
        $update_query = mysqli_query($con, $update);
        redirect('login.php');
    }else{
        echo 'Your OTP is not correct please try again';
    }

}

?>

<form action="" method="post">
    <input type="text" name="otp" placeholder="Enter your otp here">
    <button type="submit" name="submit">Verify</button>
</form>
