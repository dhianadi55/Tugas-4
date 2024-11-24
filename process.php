<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $dob = trim($_POST["dob"]);
    $password = trim($_POST["password"]);
    $gender = trim($_POST["gender"]);
    $agree = isset($_POST["agree"]) ? true : false;
    $file = $_FILES["file"];

    // Validasi panjang teks
    if (strlen($name) < 3) {
        die("Nama harus memiliki minimal 3 karakter.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Email tidak valid.");
    }

    if (!preg_match("/^\d{10,15}$/", $phone)) {
        die("Nomor telepon harus berupa angka dengan panjang 10-15 digit.");
    }

    if (strlen($password) < 8) {
        die("Kata sandi harus memiliki minimal 8 karakter.");
    }

    if (!$agree) {
        die("Anda harus menyetujui syarat dan ketentuan.");
    }

    // Validasi file
    if ($file["size"] > 2 * 1024 * 1024) {
        die("Ukuran file tidak boleh lebih dari 2MB.");
    }

    if ($file["type"] !== "text/plain") {
        die("File harus berformat .txt.");
    }

    // Membaca isi file
    $fileContent = file_get_contents($file["tmp_name"]);

    // Menyimpan data ke session untuk result.php
    session_start();
    $_SESSION["data"] = [
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "dob" => $dob,
        "gender" => $gender,
        "fileContent" => $fileContent,
        "browser" => $_SERVER["HTTP_USER_AGENT"]
    ];

    header("Location: result.php");
    exit;
}
?>
