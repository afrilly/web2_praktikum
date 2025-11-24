<?php

/**
 * Kelas Mahasiswa (Blueprint Objek Mahasiswa)
 * Modul 1: Konsep Dasar Class & Object
 */
class Mahasiswa
{
    // Properti (Attributes) - Data yang dimiliki objek
    public $nama;
    public $nim;

    /**
     * Konstruktor: Otomatis dipanggil saat objek dibuat (Instansiasi).
     * Digunakan untuk menginisialisasi properti objek.
     * @param string $nama Nama mahasiswa
     * @param string $nim NIM mahasiswa
     */
    public function __construct($nama, $nim)
    {
        // Menggunakan $this untuk mengisi properti kelas
        $this->nama = $nama;
        $this->nim = $nim; // <-- Menggunakan Setter saat Kontruksi 
        echo "--> Objek **{$this->nama}** berhasil dibuat (Konstruktor berjalan).<br>";
    }

    /**
     * 🔐 Setter (Mutator) untuk properti NIM.
     * Tempat logik validasi data diletakkan.
     */
    public function setNim($nim)
    {
        // Validasi Sederhana: NIM harus memiliki panjang 7
        if (strlen($nim) === 7) {
            $this->nim = $nim;
            return true;
        } else {
            echo "<span style='color: red;'>[ERROR ENKAPSULASI] NIM '{$nim}' tidak valid (Harus 7 
digit). NIM tidak diubah.</span><br>";
            return false;
        }
    }

    /**
     * 🔓 Getter (Accessor) untuk properti NIM.
     * Mengambil nilai properti privat.
     */
    public function getNim()
    {
        return $this->nim;
    }

    /**
     * Metode sayHello()
     */
    public function sayHello()
    {
        // Properti $nim diakses langsung karena di dalam kelas yang sama
        echo "Halo, saya adalah Mahasiswa " . $this->nama . ".<br>";
        echo "NIM saya adalah " . $this->nim . ". (NIM diakses via properti internal)";
    }

    /**
     * Destruktor
     */
    public function __destruct()
    {
        // Menggunakan Getter untuk memastikan nilainya bisa diakses jika properti dibuat private
        $nim_display = $this->nim ?? 'N/A';
        echo "--> Objek **{$this->nama}** [NIM: {$nim_display}] telah dihancurkan (Destruktor 
berjalan).<br>";
    }
}

// Catatan: Kelas Mahasiswa tidak akan dieksekusi di sini,
// melainkan di file index.php