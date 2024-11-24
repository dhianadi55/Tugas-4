<?php
session_start();
if (!isset($_SESSION["data"])) {
    die("Data tidak ditemukan.");
}
$data = $_SESSION["data"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Hasil Pendaftaran E-KTP</h1>
    <table>
        <tr>
            <th>Field</th>
            <th>Data</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?= htmlspecialchars($data["name"]) ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= htmlspecialchars($data["email"]) ?></td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td><?= htmlspecialchars($data["phone"]) ?></td>
        </tr>
        <tr>
            <td>Kata Sandi</td>
            <td>*****</td> <!-- Kata sandi disembunyikan -->
        </tr>

        <tr>
            <td>Tanggal Lahir</td>
            <td><?= htmlspecialchars($data["dob"]) ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?= htmlspecialchars($data["gender"]) ?></td>
        </tr>
        <tr>
            <td>Isi File</td>
            <td><pre><?= htmlspecialchars($data["fileContent"]) ?></pre></td>
        </tr>
        <tr>
            <td>Browser</td>
            <td><?= htmlspecialchars($data["browser"]) ?></td>
        </tr>
    </table>
</body>
</html>
