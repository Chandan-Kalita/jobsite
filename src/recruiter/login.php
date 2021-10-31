<h1>Recruiter Login Page </h1>
<form action="" method="post">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button name="submit" type="submit">Submit</button>
</form>

<?php
session_start();
if(isset($_POST['submit'])){
    include '../config.php';
    include '../inc/function.inc.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from recruiter where email='$email'";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query)>0){
        $res = mysqli_fetch_assoc($query);
        $db_pass = $res['password'];
        if($db_pass == $password){
            if($res['status'] != 1){
                $id = $res['id'];
                ?>
                <script>
                    alert("You have not verify your otp yet.. Please check your mail and get otp and verify yourself");
                    // window.location.href = 'auth.php?u=<?php //echo $id; ?>'
                </script>

                <?php
                redirect("auth.php?u=$id");
            }else{
                // echo 'yes';
                $_SESSION['user'] = $email;
                $_SESSION['name'] = $res['name'];
                redirect('index.php');
                // header("location:index.php");

            }
        }else{
            echo 'No';
    
        }
    }else{
        echo 'Wrong Credantial';
    }
}

?>