<?php
include 'header.php';
if(isset($_SESSION['id'])){
if(isset($_POST['submit'])){
    $req_id = $_GET['u'];
    isValidRecruiter($con,$req_id, 'logout.php');

    $title = $_POST['title'];
    $description = $_POST['description'];
    $salary_from = $_POST['salary_from'];
    $salary_to = $_POST['salary_to'];
    $last_date = $_POST['last_date'];
    $day = date('d');
    $month = date('m');
    $year = date('Y');
    $post_date = "$year - $month - $day";
    $checkSql = "select * from post where title = '$title' and recruiter_id = $req_id";
    $checkres = mysqli_query($con, $checkSql);
    if(mysqli_num_rows($checkres)>0){
        echo 'You have created similar post already you can update that';
    }else{       
        $sql = "insert into post (title, description, salary_from, salary_to, date, last_date, recruiter_id) values ('$title','$description','$salary_from','$salary_to','$post_date','$last_date',$req_id)";
        $query = mysqli_query($con, $sql);
        if($query){
            echo 'Post Created';
        }else{
            echo 'Something went wrong';
        }
    }

}
}else{
    redirect('index.php');
}

?>
<div class="container">
    <center>
        <h1>Create Post</h1>
<form action="" method="post">
    <input required style="padding: 5px;" type="text" name="title" placeholder="Title of the job"><br><br>
    <textarea required style="padding: 5px;" name="description" placeholder="enter the job description" cols="60" rows="15"></textarea><br><br>
    <input required type="number" style="padding: 5px;" name="salary_from" placeholder="salary from"> -
    <input required type="number" name="salary_to" style="padding: 5px;" placeholder="salary to"><br><br>
    <label for="">Last Date</label><br>
    <input required type="date" name="last_date" placeholder="last date">
    <br><br><button style="padding: 8px;" name="submit" type="submit">Submit</button>
</form>
</center>
</div>

