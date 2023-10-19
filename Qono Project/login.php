<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-3" 
    	      action="php/login.php" 
    	      method="post">

    		<h4 class="display-4  fs-1">LOGIN</h4><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

		  <div class="mb-3">
		    <label class="form-label">E-Mail<span class="text-danger">*</span></label>
		    <input type="email" 
		           class="form-control"
		           name="email"
				   placeholder="Enter Your E-Mail"
		           value="<?php echo (isset($_GET['email']))?$_GET['email']:"" ?>" required>
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Password<span class="text-danger">*</span></label>
		    <input type="password" 
		           class="form-control"
				   placeholder="Enter Your Password"
		           name="pass" required>
		  </div>
		  
		  <button type="submit" class="btn btn-success">Login</button>
		  <a href="index.php" class="btn btn-primary">Sign Up</a>
		</form>
    </div>
</body>
</html>