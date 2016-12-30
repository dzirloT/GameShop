<?php
  $citac = simplexml_load_file("slikeKonzola.xml");

  $i = 0;
  foreach($citac as $slika) {
    if($i == 0)   {
    echo "<div class = 'slikaLijevoDiv'>
    <img id = 'slikaLijevo' src='".$slika->slikaLijevo."'
    onclick='uvecaj(this.src)'>
    </div>

    <div class = 'ostaleSlike'>

    <div class = 'prviRedCl'>
        <img class = 'prviRedDesno' src='".$slika->prviRedDesno."'
          onclick='uvecaj(this.src)'>
        <img class = 'prviRedLijevo' src = '".$slika->prviRedLijevo."'
          onclick = 'uvecaj(this.src)'>
    </div>

    <div class = 'drugiRedCl'>
        <img class = 'drugiRedLijevo' src='".$slika->drugiRedDesno."'
          onclick='uvecaj(this.src)'>
        <img class = 'drugiRedDesno' src = '".$slika->drugiRedLijevo."'
          onclick = 'uvecaj(this.src)'>
    </div>

    </div>";
    break;
    }
    $i++;
  }
 ?>
