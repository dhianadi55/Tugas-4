<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran E-KTP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function validateForm() {
            const name = document.forms["registrationForm"]["name"].value.trim();
            const email = document.forms["registrationForm"]["email"].value.trim();
            const dob = document.forms["registrationForm"]["dob"].value.trim();
            const phone = document.forms["registrationForm"]["phone"].value.trim();
            const password = document.forms["registrationForm"]["password"].value.trim();
            const agree = document.forms["registrationForm"]["agree"].checked;
            const file = document.forms["registrationForm"]["file"].files[0];

            if (name.length < 3) {
                alert("Nama harus memiliki minimal 3 karakter.");
                return false;
            }

            if (!/\S+@\S+\.\S+/.test(email)) {
                alert("Email tidak valid.");
                return false;
            }

            if (!/^\d{10,15}$/.test(phone)) {
                alert("Nomor telepon harus berupa angka dengan panjang 10-15 digit.");
                return false;
            }

            if (password.length < 8) {
                alert("Kata sandi harus memiliki minimal 8 karakter.");
                return false;
            }

            if (!dob) {
                alert("Tanggal lahir harus diisi.");
                return false;
            }

            if (!agree) {
                alert("Anda harus menyetujui syarat dan ketentuan.");
                return false;
            }

            if (!file) {
                alert("File harus diupload.");
                return false;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert("Ukuran file tidak boleh lebih dari 2MB.");
                return false;
            }

            if (file.type !== "text/plain") {
                alert("File harus berformat .txt.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
<form name="registrationForm" action="process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Nomor Telepon:</label>
        <input type="tel" id="phone" name="phone" pattern="\d{10,15}" required>

        <label for="dob">Tanggal Lahir:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="password">Kata Sandi:</label>
        <input type="password" id="password" name="password" required>

        <label for="gender">Jenis Kelamin:</label>
        <select id="gender" name="gender" required>
            <option value="">Pilih...</option>
            <option value="male">Laki-laki</option>
            <option value="female">Perempuan</option>
        </select>

        <label for="file">Upload Berkas (TXT):</label>
        <input type="file" id="file" name="file" accept=".txt" required>

        <label>
            <input type="checkbox" id="agree" name="agree" required>
            Saya setuju dengan syarat dan ketentuan.
        </label>

        <button type="submit">Daftar</button>
    </form>
</body>
</html>
