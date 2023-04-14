<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
</head>
<body>

<h1>WELCOME!!!!</h1>
<p>HOTDOG SI MARTY BAHO IGOT2 HAHAHAHAH</p>

</body>
</html>



