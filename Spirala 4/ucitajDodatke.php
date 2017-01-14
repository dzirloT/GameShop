<?php

$veza = new PDO(
  "mysql:dbname=spiralnabaza;host=localhost;charset=utf8",
  "root", ""
);
$veza->exec("set names utf8");

$dodaci = $veza->query("select * from dodaci");

foreach($dodaci as $dodata) {

  $dostupneKonzole = $veza->query(
    "select k.naslovKonzole from konzole as k, veza_dodatakkonzola as v ".
    "where k.id_konzole = v.id_konzole and v.id_dodatka='".
    $dodata["id_dodadtka"].
    "'"
  );


  echo "<div class = 'proizvod'>";
  echo "<img class = 'slikaProizvoda' src =".$dodata["slikaDodatka"]." alt=''>";
  echo "<div class = 'opisProizvodA'>";
  echo "<h1 class = 'naslovProizvoda'>".$dodata["naslovDodatka"]." </h1";
  echo "<p class = 'opisProizvoda'>";
  echo "<h2 class = 'opisProizvodaL'> Accessorie description: </h2>";
  echo $dodata["opisDodatka"];
  echo "</p>";
  echo "<p id = 'dostupneKonzolePar'>Dostupno na: ";
  foreach($dostupneKonzole as $ime) {
    echo $ime["naslovKonzole"]." ";
  }
  echo "</p>";
  echo "<p class = 'cijenaProizvoda'>".$dodata["cijenaDodatka"]." </p>";
  echo "</div>";
  echo "</div>";
}

 ?>
