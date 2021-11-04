<?php
include 'header.php';
$req_id = $_SESSION['id'];
$sql = "select * from post where recruiter_id = $req_id";
$query = mysqli_query($con, $sql);
?>
<br>
<br>

<a style="font-size: 22px; color:blue" href="postCreate.php?u=<?php echo $_SESSION['id'] ?>">Create Post</a>
<br>
<br>
<div class="container">
    <table border="1px" cellspacing='0'>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Date Created</th>
            <th>Last Date</th>
            <th>Salary</th>
            <th>Action</th>
        </tr>
        <?php
        if (mysqli_num_rows($query) < 1) {
            echo "No Post";
        } else {
            while ($row = mysqli_fetch_assoc($query)) {
        ?>
                <tr>
                    <td title="<?php echo $row['title'] ?>" class="title"><?php echo $row['title'] ?></td>

                    <td title="<?php echo $row['description'] ?>" class="des"><?php echo $row['description'] ?></td>

                    <td><?php echo $row['date'] ?></td>

                    <td><?php echo $row['last_date'] ?></td>

                    <td><span class="salary"><?php echo (int)$row['salary_from'] ?></span> - <span class="salary"><?php echo (int)$row['salary_to'] ?></span></td>

                    <td><a href="update_post.php?p=<?php echo $row['id'] ?>">Update</a> <a href="delete_post.php?p=<?php echo $row['id'] ?>">Delete</a></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</div>
<script>
    //Adding (....) after a specific length of title and description
    const title = document.querySelectorAll("td.title");
    const title_length = 38;
    title.forEach((e) => {
        if (e.innerHTML.length > title_length) {
            e.innerText = `${e.innerText.substr(0, title_length)}...`;
        }
    })
    const des = document.querySelectorAll("td.des");
    const des_length = 60;
    des.forEach((e) => {
        if (e.innerHTML.length > des_length) {
            e.innerText = `${e.innerText.substr(0, des_length)}...`;
        }
    })
    //Adding (,) traditionally
    const salary = document.querySelectorAll(".salary");
    salary.forEach((e) => {
        n = e.innerHTML; //storing the string value of s_from
        x = Number(n); // converting the s_from string to Int
        e.innerHTML = x.toLocaleString();

    })
</script>