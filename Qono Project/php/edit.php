<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
    if (isset($_POST['fname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['dob']) && isset($_POST['gender']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        include "../db_conn.php";

        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $id = $_SESSION['id'];

        if ($password != $confirm_password) {
            $em = "Passwords do not match.";
            header("Location: ../edit.php?error=$em");
            exit;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $emailCheckQuery = "SELECT * FROM users WHERE email=?";
        $emailCheckStmt = $conn->prepare($emailCheckQuery);
        $emailCheckStmt->execute([$email]);
        $emailExists = $emailCheckStmt->fetch();

        
        $phoneCheckQuery = "SELECT * FROM users WHERE phone=?";
        $phoneCheckStmt = $conn->prepare($phoneCheckQuery);
        $phoneCheckStmt->execute([$phone]);
        $phoneExists = $phoneCheckStmt->fetch();

        if ($emailExists && $emailExists['id'] != $id) {
            $em = "Email is already in use.";
            header("Location: ../edit.php?error=$em");
            exit;
        }

        if ($phoneExists && $phoneExists['id'] != $id) {
            $em = "Phone number is already in use.";
            header("Location: ../edit.php?error=$em");
            exit;
        }

        $sql = "UPDATE users 
                SET fname=?, email=?, phone=?, dob=?, gender=?, password=?
                WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fname, $email, $phone, $dob, $gender, $hashed_password, $id]);

        $_SESSION['fname'] = $fname;
        header("Location: ../edit.php?success=Your account has been updated successfully");
        exit;
    } else {
        $em = "All fields are required";
        header("Location: ../edit.php?error=$em");
        exit;
    }
} else {
    header("Location: ../edit.php?error=error");
    exit;
}
?>
