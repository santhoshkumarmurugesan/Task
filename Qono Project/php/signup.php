<?php 
if(isset($_POST['fname']) && 
   isset($_POST['email']) &&  
   isset($_POST['pass']) &&  
   isset($_POST['phone']) &&  
   isset($_POST['dob']) &&  
   isset($_POST['gender'])) {

    include "../db_conn.php";

    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    $data = "fname=".$fname."&email=".$email."&phone=".$phone."&dob=".$dob."&gender=".$gender;

    
    $check_email_query = "SELECT * FROM users WHERE email=?";
    $stmt_email = $conn->prepare($check_email_query);
    $stmt_email->execute([$email]);
    if($stmt_email->rowCount() > 0) {
        $em = "Email is already registered";
        header("Location: ../index.php?error=$em&$data");
        exit;
    }

    
    $check_phone_query = "SELECT * FROM users WHERE phone=?";
    $stmt_phone = $conn->prepare($check_phone_query);
    $stmt_phone->execute([$phone]);
    if($stmt_phone->rowCount() > 0) {
        $em = "Phone number is already registered";
        header("Location: ../index.php?error=$em&$data");
        exit;
    }

    
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    
    $sql = "INSERT INTO users(fname, email, password, phone, dob, gender) 
            VALUES(?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$fname, $email, $pass, $phone, $dob, $gender]);

    header("Location: ../index.php?success=Your account has been created successfully");
    exit;

} else {
    header("Location: ../index.php?error=error");
    exit;
}
