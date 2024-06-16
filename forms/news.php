<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "moldtelecom";

// Crearea conexiunii
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificarea conexiunii
if ($conn->connect_error) {
    die("Conexiunea a eșuat: " . $conn->connect_error);
}

$email = $_POST['email'];

// Pregătirea și executarea interogării SQL
$sql = "INSERT INTO newsletter (email) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);

if ($stmt->execute()) {
    header("Location: ../index.html");
    exit();
} else {
    echo "Eroare: " . $stmt->error;
}

// Închiderea conexiunii
$stmt->close();
$conn->close();
?>
