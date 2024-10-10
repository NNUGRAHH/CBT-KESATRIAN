<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Update nomor soal saat ini
if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = 1; // Mulai dari soal pertama
}

// Increment nomor soal
$_SESSION['current_question']++;

// Alihkan ke halaman soal ujian
header("Location: quiz.php");
exit();
