<?php
include 'header.php';
// include '../config.php';
// include '../inc/function.inc.php';
if (isset($_GET['p']) && $_GET['p']>0) {
    $post_id = $_GET['p'];
    if (isset($_SESSION['id'])) {
        $req_id = $_SESSION['id'];
        isValidRecruiter($con,$req_id, 'logout.php');
        $checkSql = "select * from post where id = $post_id and recruiter_id = $req_id";
        $checkQuery = mysqli_query($con, $checkSql);
        if (mysqli_num_rows($checkQuery) < 1) {
            redirect('index.php');
        } else {
            //update query here
            $row = mysqli_fetch_assoc($checkQuery);
            $db_title = $row['title'];
            $db_description = $row['description'];
            $db_salary_from = $row['salary_from'];
            $db_salary_to = $row['salary_to'];
            $db_last_date = $row['last_date'];
        }
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $salary_from = $_POST['salary_from'];
            $salary_to = $_POST['salary_to'];
            $last_date = $_POST['last_date'];
            $day = date('d');
            $month = date('m');
            $year = date('Y');
            $post_date = "$year - $month - $day";

            $checkTitle = "select * from post where title = '$title' and id != $post_id and recruiter_id = $req_id";
            $checkTitleres = mysqli_query($con, $checkTitle);
            if (mysqli_num_rows($checkTitleres) >0) {
                    // redirect('index.php');
                    echo 'You have created similar post already you can update that';
            } else {
                $sql = "update post set title = '$title', description = '$description', salary_from= '$salary_from', salary_to = '$salary_to', last_date='$last_date', date='$post_date' where id=$post_id";
                $query = mysqli_query($con, $sql);
                if ($query) {
                    // echo 'Post Updated';
                    redirect('index.php');
                } else {
                    redirect('index.php');
                    echo 'Something went wrong';
                }
            }
        }
    }
} else {
    redirect('index.php');
}

?>
<div class="container">
    <center>
        <h1>Create Post</h1>
        <form action="" method="post">
            <input required style="padding: 5px;" type="text" name="title" placeholder="Title of the job" value="<?php echo $db_title; ?>"><br><br>
            <textarea required style="padding: 5px;" name="description" placeholder="enter the job description" cols="60" rows="15"><?php echo $db_description; ?></textarea><br><br>
            <input required type="number" style="padding: 5px;" name="salary_from" placeholder="salary from" value="<?php echo $db_salary_from; ?>"> -
            <input required type="number" name="salary_to" style="padding: 5px;" placeholder="salary to" value="<?php echo $db_salary_to; ?>"><br><br>
            <label for="">Last Date</label><br>
            <input required type="date" name="last_date" placeholder="last date" value="<?php echo $db_last_date; ?>">
            <br><br><button style="padding: 8px;" name="submit" type="submit">Submit</button>
        </form>
    </center>
</div>