<?php

$veza = new PDO(
  "mysql:dbname=spiralnabaza;host=localhost;charset=utf8",
  "root", ""
);
$veza->exec("set names utf8");

$konzole = $veza->query("select * from konzole");

foreach($konzole as $konzola) {
  echo "<div class = 'proizvod'>";
  echo "<img class = 'slikaProizvoda' src =".$konzola["slikaKonzole"]." alt=''>";
  echo "<div class = 'opisProizvodA'>";
  echo "<h1 class = 'naslovProizvoda'>".$konzola["naslovKonzole"]." </h1";
  echo "<p class = 'opisProizvoda'>";
  echo "<h2 class = 'opisProizvodaL'> Accessorie description: </h2>";
  echo $konzola["opisKonzole"];
  echo "</p> <br>";
  echo "<p class = 'cijenaProizvoda'>".$konzola["cijenaKonzole"]." </p>";
  echo "</div>";
  echo "</div>";
}

 ?>
