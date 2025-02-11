<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$type = $_POST['type'];
$capaciteit = $_POST['capaciteit']; 
if(isset($_POST['prioriteit']))
{
    $prioriteit = true;
}
else
{
    $prioriteit = false;
}
$melder = $_POST['melder'];


//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder)
VALUES(:attractie, :type, :capaciteit, :prioriteit, :melder)";
//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":capaciteit" => $capaciteit,
    ":prioriteit" => $prioriteit,
    ":melder" => $melder,
   ]);


   header("Location: ../meldingen/index.php?msg=Melding opgeslagen");

