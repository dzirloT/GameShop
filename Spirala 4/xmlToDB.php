<?php

$veza = new PDO(
  "mysql:dbname=spiralnabaza;host=localhost;charset=utf8",
  "root", ""
);
$veza->exec("set names utf8");

$sveIgre = $veza->query("select id_igre from igre");
$sveKonzole = $veza->query("select id_konzole from konzole");
$sviDodaci = $veza->query("select id_dodadtka from dodaci");

if(!$sveIgre) {
  $greska = $veza->errorInfo();
  print "SQL greška: ".$greska[2];
  exit();
}
if(!$sveKonzole)  {
  $greska = $veza->errorinfo();
  print "SQL greška: ".$greska[2];
  exit();
}
if(!$sviDodaci) {
  $greska = $veza->errorinfo();
  print "SQL greška: ".$greska[2];
  exit();
}

$konzoleXML = simplexml_load_file("konzole.xml");
foreach($konzoleXML->konzola as $k) {

  $sthH = $veza->prepare(
    'SELECT naslovKonzole FROM konzole where naslovKonzole=?');
  $sthH->execute(array($k->naslovKonzole));
  $naziv = $sthH->fetch(PDO::FETCH_ASSOC)["naslovKonzole"];

  if($naziv != $k->naslovKonzole) {
    $veza->query(
      "insert into konzole set naslovKonzole='".$k->naslovKonzole."', opisKonzole='".
    $k->opisKonzole."', slikaKonzole='".$k->slikaKonzole."', cijenaKonzole='".
    $k->cijenaKonzole."'"
    );
  }
}


$igreXML = simplexml_load_file("igre.xml");
foreach($igreXML->igra as $ig)  {

  $sth = $veza->prepare(
    'SELECT nazivIgre FROM igre where nazivIgre=?');
    $sth->execute(array($ig->naslovIgre));
    $naziv = $sth->fetch(PDO::FETCH_ASSOC)["nazivIgre"];
    if($naziv != $ig->naslovIgre) {
      $veza->query(
        "insert into igre set nazivIgre='".$ig->naslovIgre."', opisIgre='".
      $ig->opisIgre."', slikaIgre='". $ig->slikaIgre."', cijenaIgre='".
      $ig->cijenaIgre."'"
      );
      $sth = $veza->prepare(
        'SELECT id_igre, nazivIgre FROM igre where nazivIgre=?'
      );
        $sth->execute(array($ig->naslovIgre));
        $idIgre = $sth->fetch(PDO::FETCH_ASSOC)["id_igre"];
        if((string)$ig->ps4 == "true") {
          $sth = $veza->prepare(
            'SELECT id_konzole, naslovKonzole FROM konzole where naslovKonzole=?'
          );
            $sth->execute(array("PS4"));
            $idKonzole = $sth->fetch(PDO::FETCH_ASSOC)["id_konzole"];
          $veza->query(
            "insert into veza_igrakonzola set id_igre='".$idIgre."', id_konzole='".
            $idKonzole."'"
          );
        }
        if($ig->xboxone == "true") {

          $sth = $veza->prepare(
            'SELECT id_konzole, naslovKonzole FROM konzole where naslovKonzole=?'
          );
            $sth->execute(array("Xbox ONE"));
            $idKonzole = $sth->fetch(PDO::FETCH_ASSOC)["id_konzole"];
          $veza->query(
            "insert into veza_igrakonzola set id_igre='".$idIgre."', id_konzole='".
            $idKonzole."'"
          );
        }
        if((string)$ig->wiiu == "true") {
          $sth = $veza->prepare(
            'SELECT id_konzole, naslovKonzole FROM konzole where naslovKonzole=?'
          );
            $sth->execute(array("Wii U"));
            $idKonzole = $sth->fetch(PDO::FETCH_ASSOC)["id_konzole"];
          $veza->query(
            "insert into veza_igrakonzola set id_igre='".$idIgre."', id_konzole='".
            $idKonzole."'"
          );
        }
    }
}

$dodaciXML = simplexml_load_file("dodaci.xml");
foreach($dodaciXML->dodatak as $d)  {

  $sth = $veza->prepare(
    'SELECT naslovDodatka FROM dodaci where naslovDodatka=?');
    $sth->execute(array($d->naslovDodatka));
    $naziv = $sth->fetch(PDO::FETCH_ASSOC)["naslovDodatka"];
    if($naziv != $d->naslovDodatka) {


      $veza->query(
        "insert into dodaci set naslovDodatka='".$d->naslovDodatka."', opisDodatka='".
      $d->opisDodatka."', slikaDodatka='". $d->slikaDodatka."', cijenaDodatka='".
      $d->cijenaDodatka."'"
      );


      $sth = $veza->prepare(
        'SELECT id_dodadtka, naslovDodatka FROM dodaci where naslovDodatka=?'
      );
        $sth->execute(array($d->naslovDodatka));
        $idDodatka = $sth->fetch(PDO::FETCH_ASSOC)["id_dodadtka"];
        echo "ID dodatka je: ".$idDodatka;

        if((string)$d->ps4 == "true") {
          $sth = $veza->prepare(
            'SELECT id_konzole, naslovKonzole FROM konzole where naslovKonzole=?'
          );
            $sth->execute(array("PS4"));
            $idKonzole = $sth->fetch(PDO::FETCH_ASSOC)["id_konzole"];
          $veza->query(
            "insert into veza_dodatakkonzola set id_dodatka='".$idDodatka."', id_konzole='".
            $idKonzole."'"
          );
          echo             "insert into veza_dodatakkonzola set id_dodatka='".$idDodatka."', id_konzole='".
                      $idKonzole."'";
        }
        if($d->xboxone == "true") {

          $sth = $veza->prepare(
            'SELECT id_konzole, naslovKonzole FROM konzole where naslovKonzole=?'
          );
            $sth->execute(array("Xbox ONE"));
            $idKonzole = $sth->fetch(PDO::FETCH_ASSOC)["id_konzole"];
          $veza->query(
            "insert into veza_dodatakkonzola set id_dodatka='".$idDodatka."', id_konzole='".
            $idKonzole."'"
          );
        }
        if((string)$d->wiiu == "true") {
          $sth = $veza->prepare(
            'SELECT id_konzole, naslovKonzole FROM konzole where naslovKonzole=?'
          );
            $sth->execute(array("Wii U"));
            $idKonzole = $sth->fetch(PDO::FETCH_ASSOC)["id_konzole"];
          $veza->query(
            "insert into veza_dodatakkonzola set id_dodatka='".$idDodatka."', id_konzole='".
            $idKonzole."'"
          );
        }
    }
}
 ?>
