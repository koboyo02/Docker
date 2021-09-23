<?php
$servername = 'database';
$username = 'root';
$password = 'root';
//On établit la connexion
try{
    $conn = new PDO("mysql:host=$servername;dbname=Docker", $username, $password);
    //On définit le mode d'erreur de PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion réussie';
}
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
  }

$reponse = $conn->prepare("SELECT * FROM Users");
$reponse->execute(); 
$donnees = $reponse->fetch();

try {
  echo json_encode($donnees['ID']);
  echo json_encode($donnees['Username']);
  echo json_encode($donnees['Email']);
  echo json_encode($donnees['password']);
  if ($donnees === false) {
      die("Erreur");
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}
?>