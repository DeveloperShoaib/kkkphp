<?php
session_start();

if (!isset($_POST['update_id']) && !isset($_GET['edit'])) {
    unset($_SESSION['edit_id']);
}

include "helper.php";

// $num = $_SESSION['num'] ?? "";
// unset($_SESSION['num']);



//var_dump($data);
//var_dump($old);

//old value for update
$name = $surname = $dob = $email = $password = "";
$address = $website = $comment = $phone = $gender = "";
$old_image = "";
$id = "";



    if(isset($_POST['update_id'])){

    $id = $_POST['update_id'];

    $_SESSION['edit_id'] = $id; 



    $q = mysqli_query($con,"SELECT * FROM userdatabase WHERE id='$id'");
    $data = mysqli_fetch_assoc($q);

    $name     = $data['name'];
    $surname  = $data['surname'];
    $dob      = $data['dob'];
    $email    = $data['email'];
    $password = $data['password'];
    $address  = $data['address'];
    $website  = $data['website'];
    $comment  = $data['comment'];
    $phone    = $data['phone'];
    $gender   = $data['gender'];
    $old_image = $data['picstore'];
}


if(isset($_SESSION['edit_id'])){
    $edit_id = $_SESSION['edit_id'];
} else {
    $edit_id = "";
}


// if(isset($_SESSION['old'])){
//     $name = $_SESSION['old']['name'];
// }else{
//     $name = "";
// }
// if(isset($_SESSION['old'])){
//     $surname = $_SESSION['old']['surname'];
// }else{
//     $surname = "";
// }
// if(isset($_SESSION['old'])){
//     $dob = $_SESSION['old']['dob'];
// }else{
//     $dob = "";
// }
// if(isset($_SESSION['old'])){
//     $email = $_SESSION['old']['email'];
// }else{
//     $email = "";
// }
// if(isset($_SESSION['old'])){
//     $password = $_SESSION['old']['password'];
// }else{
//     $password = "";
// }
// if(isset($_SESSION['old'])){
//     $address = $_SESSION['old']['address'];
// }else{
//     $address = "";
// }

// if(isset($_SESSION['old'])){
//     $website = $_SESSION['old']['website'];
// }else{
//     $website = "";
// }

// if(isset($_SESSION['old'])){
//     $comment = $_SESSION['old']['comment'];
// }else{
//     $comment = "";
// }
// if(isset($_SESSION['old'])){
//     $phone = $_SESSION['old']['phone'];
// }else{
//     $phone = "";
// }
  
$old = $_SESSION['old'] ?? [];


// for validation errors
 
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
} else {
    $errors = [];
}

// if (isset($_SESSION['old'])) {
//     $old = $_SESSION['old'];
// } else {
//     $old = [];
// }



unset($_SESSION['errors']);
unset($_SESSION['old']);

?>

<!DOCTYPE html>
<html>
<head>
<title>Form</title>
<style>.error{color:red;}</style>
</head>
<body>

<form action="helper.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
    
    <input type="hidden" name="old_image" value="<?= $old_image ?>">

    Name:  
    <input type="text" name="name" value="<?= $old['name'] ?? $name ?>"> 
    <span class="error"><?= $errors['name'] ?? '' ?></span>
    
    <br><br>

    Surname:  
    <input type="text" name="surname" value="<?= $old['surname'] ?? $surname ?>">
    <span class="error"><?= $errors['surname'] ?? '' ?></span>
    <br><br>

DOB:  
<input type="date" name="dob" value="<?= $old['dob'] ?? $dob ?>">
<br><br>

Email:  
<input type="text" name="email" value="<?= $old['email'] ?? $email ?>">
<span class="error"><?= $errors['email'] ?? '' ?></span>
<br><br>

Password:  
<input type="text" name="password" value="<?= $old['password'] ?? $password ?>">
<span class="error"><?= $errors['password'] ?? '' ?></span>
<br><br>

Address:  
<textarea name="address"><?= $old['address'] ?? $address ?></textarea>
<br><br>

Website:  
<input type="text" name="website" value="<?= $old['website'] ?? $website ?>">
<br><br>

Comment:  
<textarea name="comment"><?= $old['comment'] ?? $comment ?></textarea>
<br><br>

Phone:  
<input type="text" name="phone" value="<?= $old['phone'] ?? $phone ?>">
<span class="error"><?= $errors['phone'] ?? '' ?></span>
<!--<span class="error"><?= $num ?></span>--> 
<br><br>

Gender: 
<input type="radio" name="gender" value="male"   <?= ($old['gender'] ?? $gender)=="male"?"checked":"" ?>> Male
<input type="radio" name="gender" value="female" <?= ($old['gender'] ?? $gender)=="female"?"checked":"" ?>> Female
<input type="radio" name="gender" value="other"  <?= ($old['gender'] ?? $gender)=="other"?"checked":"" ?>> Other
<span class="error"><?= $errors['gender'] ?? '' ?></span>
<br><br>

Image:
<input type="file" name="image">
<?= $old_image ?>
<input type="checkbox" name="remove_image" value="1"> remove also image
<br><br>

<input type="submit" name="save" value="Save">

</form>

</body>
</html>










