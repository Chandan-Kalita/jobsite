<?php
include 'header.php';
?>

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
        <tr>
            <td id="title">Lorem ipsum dolor sit amet consecteconsecteconsectetur</td>
            <td id="des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, facilis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, neque.</td>
            <td>10th Oct, 2021</td>
            <td>10th Dec, 2021</td>
            <td>10,000 - 18,000</td>
            <td><a href="">Update</a> <a href="">Delete</a></td>
        </tr>
    </table>
</div>
<script>
    let title = document.querySelector('#title').innerHTML;
    if(title.length>38){
        let res = title.substr(0,38)+'...';
        document.querySelector('#title').innerHTML = res;
    }

    let des = document.querySelector('#des').innerHTML;
    if(des.length>60){
        let dres = des.substr(0,70)+'...';
        document.querySelector('#des').innerHTML = dres;
    }
</script>