<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, alihkan ke halaman login
    header("Location: login.php");
    exit();
}

// Logika untuk mendapatkan nomor soal saat ini
$current_question = isset($_SESSION['current_question']) ? $_SESSION['current_question'] : 1;

// Soal-soal ujian dalam array
$questions = [
    "Apa ibukota Indonesia?",
    "Siapa presiden pertama Indonesia?",
    "Apa nama pulau terbesar di Indonesia?"
];

// Jika soal sudah habis, reset ke soal pertama
if ($current_question > count($questions)) {
    $_SESSION['current_question'] = 1;
    header("Location: quiz.php");
    exit();
}

$question = $questions[$current_question - 1]; // Ambil soal saat ini
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>SOAL NO. <?php echo $current_question; ?></h2>
    <p><?php echo $question; ?></p>
    
    <form action="next_question.php" method="POST">
        <label>
            <input type="radio" name="answer" value="A"> A. Pilihan A
        </label><br>
        <label>
            <input type="radio" name="answer" value="B"> B. Pilihan B
        </label><br>
        <button type="submit">Soal Selanjutnya</button>
    </form>
</body>
</html>
