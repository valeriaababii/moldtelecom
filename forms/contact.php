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

// Preluarea datelor din formular
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Pregătirea și executarea interogării SQL
$sql = "INSERT INTO messages (name, email, subiect, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql); // corectare: folosire prepare în loc de mysql
$stmt->bind_param("ssss", $name, $email, $subject, $message);

if ($stmt->execute()) {
  header("Location: ../contact.html");
  exit();
} else {
  echo "Eroare: " . $stmt->error;
}
// Închiderea conexiunii
$stmt->close();
$conn->close();
?>
