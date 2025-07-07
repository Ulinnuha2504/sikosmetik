<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan PHP</title>
</head>

<body>
    <?php
    // membuat array 2 dimensi yang berisi array asosiatif
    $artikel = [
        [
            "judul" => "Belajar PHP & MySQL untuk Pemula",
            "penulis" => "Subianto"
        ],
        [
            "judul" => "Tutorial PHP dari Nol hingga Mahir",
            "penulis" => "Subianto"
        ],
        [
            "judul" => "Membuat Aplikasi Web dengan PHP",
            "penulis" => "Subianto"
        ]
    ];

    // menampilkan array
    foreach ($artikel as $post) {
        echo "<h2>" . $post["judul"] . "</h2>";
        echo "<p>" . $post["penulis"] . "<p>";
        echo "<hr>";
    }
    ?>



</body>

</html>