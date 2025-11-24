<?php
// 1. Masukkan (include) file class Mahasiswa.
require_once 'Mahasiswa.php';

// Masukkan (include) kedua file kelas
require_once 'User.php';
require_once 'Admin.php';

// 1. Instansiasi Objek User Biasa
$user1 = new User("Rani Permata");

// 2. Instansiasi Objek Admin (Kelas Anak)
$admin1 = new Admin("Gagah Perkasa");


// 2. Instansiasi Objek DENGAN PARAMETER
// $mhs1 (NIM valid)
$mhs1 = new Mahasiswa("Budi Santoso", "2023001");

// 3. Mengisi Properti Objek (Mengakses data di dalam objek)
//$mhs1->nama = "Andi Pratama";
//$mhs1->nim = "2023005";
// 4. Membuat objek kedua (optional, untuk menunjukkan setiap objek unik)

// $mhs2 (NIM tidak valid, akan ditolak oleh konstruktor/setter)
$mhs2 = new Mahasiswa("Citra Kirana", "20230002"); // NIM 8 digit

//Catatan :  proses destruktor (__destruct) akan berjalan di akhir eksekusi skrip,
// namun di lingkungan tertentu (seperti iframe), outputnya mungkin tidak selalu terlihat.
//$mhs2->nama = "Sinta Dewi";
//$mhs2->nim = "2023006";

// Mencoba mengubah NIM (Setter) - Sukses
echo "<h3 style='color:#2980b9;'>--- DEMO SETTER (mhs1) ---</h3>";
$mhs1->setNim("1234567"); // 7 digit - Sukses

// Mencoba mengubah NIM (Setter) - Gagal (validasi di dalam setter menolak)
$mhs1->setNim("999"); // 3 digit - Gagal
?>

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Modul 1: Dasar OOP</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            padding:
                20px;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }

        h2 {
            color: #34495e;
            margin-top: 30px;
        }

        .output {
            background-color: #ecf0f1;
            border-left: 5px solid #3498db;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Modul 1: Konsep Dasar OOP (Class & Object)</h1>

        <h2>Objek Pertama: <?php echo $mhs1->nama; ?></h2>
        <div class="output">
            <!-- 5. Memanggil Metode Objek -->
            <?php $mhs1->sayHello(); ?>
        </div>

        <h2>Objek Kedua: <?php echo $mhs2->nama; ?></h2>
        <div class="output">
            <!-- Memanggil Metode Objek Kedua -->
            <?php $mhs2->sayHello(); ?>
        </div>

        <p class="mt-4">
            <em>(Lihat kode di `Mahasiswa.php` untuk definisi kelas, dan kode di `index.php` untuk
                cara menggunakannya.)</em>
        </p>

    </div>

    <div class="container">
        <h1>Modul 2: Konstruktor, Destruktor, dan $this</h1>

        <h2>Objek Pertama: <?php echo $mhs1->nama; ?></h2>
        <div class="output">
            <!-- 4. Memanggil Metode Objek -->
            <?php $mhs1->sayHello(); ?>
        </div>

        <h2>Objek Kedua: <?php echo $mhs2->nama; ?></h2>
        <div class="output">
            <!-- Memanggil Metode Objek Kedua -->
            <?php $mhs2->sayHello(); ?>
        </div>

        <p>
            <em>(Output konstruktor ada di atas hasil sapaan. Output destruktor akan muncul
                terakhir.)</em>
        </p>

    </div>

    <div class="container">
        <h1>Modul 3: Encapsulation (Pengecekan Data)</h1>

        <h2>Objek Pertama: <?php echo $mhs1->nama; ?></h2>
        <div class="output">
            <!-- 4. Memanggil Metode Objek -->
            <?php $mhs1->sayHello(); ?>
            <p><strong>NIM Saat Ini (via Getter):</strong> <span style="font-weight: bold; color: 
#e67e22;"><?php echo $mhs1->getNim(); ?></span></p>
        </div>

        <h2>Objek Kedua: <?php echo $mhs2->nama; ?></h2>
        <div class="output">
            <!-- Memanggil Metode Objek Kedua -->
            <?php $mhs2->sayHello(); ?>
            <p><strong>NIM Saat Ini (via Getter):</strong> <span style="font-weight: bold; color: 
#e67e22;"><?php echo $mhs2->getNim(); ?></span></p>
            <p style="color: red;">*Objek ini dibuat dengan NIM tidak valid, namun Setter
                mencegahnya masuk ke properti.</p>
        </div>

        <p>
            <em>(Coba hapus method **getNim()** dari kode dan akses NIM secara langsung: **$mhs1-
                >nim**. Anda akan mendapatkan Fatal Error karena NIM bersifat private!)</em>
        </p>

    </div>

    <div class="container">
        <h1>Modul 4: Inheritance (Pewarisan User dan Admin)</h1>

        <h2>Pengguna Biasa (Kelas User)</h2>
        <div class="output">
            <p style="color: #27ae60; font-size: 1.1em;"><?php echo $user1->salam(); ?></p>
            <p>Peran yang diwarisi: <span class="role-user"><?php echo $user1->getRole();
                                                            ?></span></p>
        </div>

        <h2>Administrator (Kelas Admin)</h2>
        <div class="output">
            <!-- Output dari metode yang telah di-override -->
            <p style="color: #e74c3c; font-size: 1.1em;"><?php echo $admin1->salam(); ?></p>
            <!-- Memanggil metode yang hanya dimiliki oleh Admin -->
            <p><?php echo $admin1->kelolaSistem(); ?></p>
            <p>Peran yang diwarisi: <span class="role-admin"><?php echo $admin1->getRole();
                                                                ?></span></p>
        </div>

        <p>
            <em>(Perhatikan bahwa objek Admin memiliki metode **salam()** yang berbeda dan dapat
                menggunakan metode dasar **getRole()** dari kelas User.)</em>
        </p>

</body>

</html>