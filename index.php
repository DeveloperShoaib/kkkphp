<?php
session_start();
include "helper.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Index</title>
</head>

<body>
 <td><a href="form.php"><button>Add</button></a></td>
<table border="2" cellpadding="10" cellspacing="2">
<tr>
    <th>ID</th>
    <th>Image</th>
    <th>Name</th>
    <th>Surname</th>
    <th>DOB</th>
    <th>Email</th>
    <th>Password</th>
    <th>Address</th>
    <th>Website</th>
    <th>Comment</th>
    <th>Phone</th>
    <th>Gender</th>
    
    <th>Update</th>
    <th>Delete</th>
</tr>

<?php
$res = mysqli_query($con,"SELECT * FROM userdatabase");

while($row=mysqli_fetch_assoc($res)){ ?>

<tr>
    <td><?= $row['id'] ?></td>
    <td><img src="<?= $row['picstore']; ?>" width="80"></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['surname'] ?></td>
    <td><?= $row['dob'] ?></td> 
    <td><?= $row['email'] ?></td>
    <td><?= $row['password'] ?></td>
    <td><?= $row['address'] ?></td>
    <td><?= $row['website'] ?></td>
    <td><?= $row['comment'] ?></td>
    <td><?= $row['phone'] ?></td>
    <td><?= $row['gender'] ?></td>

    <!-- <td><a href="form.php"><button>Add</button></a></td> -->

    <td>
        <form action="form.php" method="post">
            <input type="hidden" name="update_id" value="<?= $row['id'] ?>">
            <button type="submit">Update</button>
        </form>
    </td>

    <td><button class="delete-btn" data-id="<?= $row['id'] ?>">Delete</button></td>
</tr>
   
<?php } ?>
</table>



<script>
document.addEventListener("DOMContentLoaded", function () {

    const buttons = document.querySelectorAll(".delete-btn");

    buttons.forEach(btn => {
        btn.addEventListener("click", function () {

            let id = this.getAttribute("data-id");

            let deletesms = confirm(" delete this record?");

            if (deletesms) {
                 
                window.location.href = "helper.php?delete=" + id;
            } 
            // else
        });
    });

});
</script>

</body>
</html>
