<!DOCTYPE html>
<html>
<head>
    	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 	
	integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form class="shadow w-450 p-3"
              action="php/signup.php"
              method="post"
              enctype="multipart/form-data">

            <h4 class="display-4  fs-1">Create Account</h4><br>
            <?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

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
                       placeholder="Enter Your  Name"
                       value="<?php echo (isset($_GET['fname'])) ? $_GET['fname'] : ""; ?>"required>
            </div>

            <div class="mb-3">
                <label class="form-label">E-Mail<span class="text-danger">*</span></label>
                <input type="email"
                       class="form-control"
                       name="email"
                       placeholder="Enter Your Email"
                       value="<?php echo (isset($_GET['email'])) ? $_GET['email'] : ""; ?>"required>
            </div>

            

            <div class="mb-3">
    <label class="form-label">Phone Number<span class="text-danger">*</span></label>
    <input type="tel"
           class="form-control"
           name="phone" 
           
           placeholder="123-456-7890"
           value="<?php echo (isset($_GET['phone'])) ? $_GET['phone'] : ""; ?>"
           required>
</div>


            <div class="mb-3">
                <label class="form-label">Date of Birth<span class="text-danger">*</span></label>
                <input type="date"
                       class="form-control"
                       name="dob"
                       value="<?php echo (isset($_GET['dob'])) ? $_GET['dob'] : ""; ?>"required>
            </div>

            <div class="mb-3">
    <label class="form-label">Gender<span class="text-danger">*</span></label>
    <select class="form-select" name="gender" required>
        <option value="" <?php echo (!isset($_GET['gender']) || $_GET['gender'] === '') ? 'selected' : ''; ?>>--- Select ---</option>
        <option value="male" <?php echo (isset($_GET['gender']) && $_GET['gender'] === 'male') ? 'selected' : ''; ?>>Male</option>
        <option value="female" <?php echo (isset($_GET['gender']) && $_GET['gender'] === 'female') ? 'selected' : ''; ?>>Female</option>
        <option value="other" <?php echo (isset($_GET['gender']) && $_GET['gender'] === 'other') ? 'selected' : ''; ?>>Other</option>
    </select>
</div>


<div class="mb-3">
        <label class="form-label">Password<span class="text-danger">*</span></label>
        <input type="password"
               class="form-control"
               placeholder="Enter Your Password"
               name="pass"
               id="password"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Confirm Password<span class="text-danger">*</span></label>
        <input type="password"
               class="form-control"
               placeholder="Confirm Your Password"
               id="confirm_password"
               required>
        <small id="password_message" class="form-text text-danger"></small>
    </div>

            

            <button type="submit" class="btn btn-primary">Sign Up</button>
<a href="login.php" class="btn btn-success"> Login</a>

        </form>
    </div>
    <script>
        
        var password = document.getElementById("password");
        var confirm_password = document.getElementById("confirm_password");
        var password_message = document.getElementById("password_message");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                password_message.textContent = "Passwords do not match!";
            } else {
                password_message.textContent = "";
            }
        }

        confirm_password.addEventListener("keyup", validatePassword);
    </script>
</body>
</html>
