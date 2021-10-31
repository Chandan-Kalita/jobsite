<h1>Recruiter Registration Page </h1>
<form action="" method="post">
    <input required autocomplete="off" autof type="text" name="name" placeholder="Company Name">
    <input required autocomplete="off" autof type="email" name="email" placeholder="Email">
    <input required autocomplete="off" autof type="password" name="password" placeholder="Password">
    <button name="submit" type="submit">Submit</button>
</form>

<?php
include '../inc/function.inc.php';
include '../config.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $checksql = "select * from recruiter where email = '$email'";
    $checkquery = mysqli_query($con, $checksql);
    $count = mysqli_num_rows($checkquery);
    if($count>0){
        ?>
            <script>alert("Email Already Exist")
                    window.location.href = window.location.href;
            </script>

        <?php
    }else{



        $otp = rand(100001, 999999);

        $sql = "insert into recruiter (name, email, password, otp, status) values ('$name','$email','$password', '$otp',0)";
        $insert_res = mysqli_query($con, $sql);
        $id = mysqli_insert_id($con);

        if($insert_res){
            mailUsing($email,$name,$otp);
            echo '<script>window.location.href = "auth.php?u='.$id.'"</script>';
            // header("location: auth.php?u=$email");
        }else{

        }
    }
    
}

?>