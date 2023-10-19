<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
include "db_conn.php";
include 'php/User.php';

$user = getUserById($_SESSION['id'], $conn);

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php if ($user) { ?>

    <div class="d-flex justify-content-center align-items-center vh-100">
        
        <form class="shadow w-450 p-3" 
              action="php/edit.php" 
              method="post"
              enctype="multipart/form-data">

            <h4 class="display-4  fs-1">Edit Profile</h4><br>
            <!-- error -->
            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>
            
            <!-- success -->
            <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success" role="alert">
              <?php echo $_GET['success']; ?>
            </div>
            <?php } ?>
          <div class="mb-3">
            <label class="form-label">Full Name<span class="text-danger">*</span></label>
            <input type="text" 
                   class="form-control"
                   name="fname" 
                   value="<?php echo $user['fname']?>"required>
          </div>

          <div class="mb-3">
            <label class="form-label">E-mail<span class="text-danger">*</span></label>
            <input type="email" 
                   class="form-control"
                   name="email"
                   value="<?php echo $user['email']?>"required>
          </div>

          <div class="mb-3">
    <label class="form-label">Phone<span class="text-danger">*</span></label>
    <input type="tel" 
    class="form-control" 
    name="phone"  
    value="<?php echo $user['phone']?>"required>
    
</div>


          <div class="mb-3">
            <label class="form-label">DOB<span class="text-danger">*</span></label>
            <input type="date" 
                   class="form-control"
                   name="dob"
                   value="<?php echo $user['dob']?>"required>
          </div>

          <div class="mb-3">
    <label class="form-label">Gender<span class="text-danger">*</span></label>
    <select class="form-select" name="gender" required>
        <option value="" <?php if(empty($user['gender'])) echo 'selected'; ?>>--- Select ---</option>
        <option value="male" <?php if($user['gender'] == 'male') echo 'selected'; ?>>Male</option>
        <option value="female" <?php if($user['gender'] == 'female') echo 'selected'; ?>>Female</option>
        <option value="other" <?php if($user['gender'] == 'other') echo 'selected'; ?>>Other</option>
    </select>
</div>
<div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_password">
    </div>




          
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="home.php" class="btn btn-success">Home</a>
        </form>
    </div>
    <?php }else{ 
        header("Location: home.php");
        exit;

    } ?>
</body>
</html>


<?php }else {
	header("Location: login.php");
	exit;
} ?>