<?php

$host = 'localhost';
$dbname = 'projet';
$username = "postgres";
$password = "nsi";

$dbconn = pg_pconnect("host=$host port=5432 dbname=$dbname user=$username password=$password");
if (!$dbconn){
    echo "Erreur connection";
    exit;
}

$sql1 = 'CREATE TABLE IF NOT EXISTS Film (NUM INTEGER PRIMARY KEY, Titre VARCHAR)';
$result = pg_query($dbconn,$sql1);

$sql2 = 'DELETE FROM Film';
$result = pg_query($dbconn,$sql2);

$sql3 = 'INSERT INTO Film VALUES (1, \'Batman\')';
$result = pg_query($dbconn,$sql3);

$sql4 = 'SELECT * FROM Film';
$result = pg_query($dbconn,$sql4);

if (!$result) {
    echo "Requête impossible.\n";
    exit;
}

while ($row = pg_fetch_row($result)) {
  echo "Numéro: $row[0] Titre: $row[1]";
  echo "<br />\n";
}

?>