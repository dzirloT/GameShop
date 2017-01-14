<?php

$veza = new PDO(
  "mysql:dbname=spiralnabaza;host=localhost;charset=utf8",
  "root", ""
);
$veza->exec("set names utf8");

$igre = $veza->query("select * from igre");
/*$dostupneKonzole = $veza->query(
  "select k.naslovKonzole from konzole as k , igre as i, veza_igrakonzola as v ".
  "where k.id_konzole = v.id_konzole and i.id_igre = v.id_igre"
);
*/



foreach($igre as $igra) {

  $dostupneKonzole = $veza->query(
    "select k.naslovKonzole from konzole as k, veza_igrakonzola as v ".
    "where k.id_konzole = v.id_konzole and v.id_igre='".
    $igra["id_igre"].
    "'"
  );


  echo "<div class = 'proizvod'>";
  echo "<img class = 'slikaProizvoda' src =".$igra["slikaIgre"]." alt=''>";
  echo "<div class = 'opisProizvodA'>";
  echo "<h1 class = 'naslovProizvoda'>".$igra["nazivIgre"]." </h1";
  echo "<p class = 'opisProizvoda'>";
  echo "<h2 class = 'opisProizvodaL'> Game description: </h2>";
  echo $igra["opisIgre"];
  echo "</p>";
  echo "<p id = 'dostupneKonzolePar'>Dostupno na: ";
  foreach($dostupneKonzole as $ime) {
    echo $ime["naslovKonzole"]." ";
  }
  echo "</p>";
  echo "<p class = 'cijenaProizvoda'>".$igra["cijenaIgre"]." </p>";
  echo "</div>";
  echo "</div>";

}



  /*  $citac = simplexml_load_file("igre.xml");

    foreach($citac as $igra)  {
      echo "<div class = 'proizvod'>";
      echo "<img class = 'slikaProizvoda' src =".$igra->slikaIgre." alt=''>";
      echo "<div class = 'opisProizvodA'>";
      echo "<h1 class = 'naslovProizvoda'>".$igra->naslovIgre." </h1";
      echo "<p class = 'opisProizvoda'>";
      echo "<h2 class = 'opisProizvodaL'> Game description: </h2>";
      echo $igra->opisIgre;
      echo "</p> <br>";
      echo "<p class = 'cijenaProizvoda'>".$igra->cijenaIgre." </p>";
      echo "</div>";
      echo "</div>";
    }*/
 ?>
