<?php
  $mail = $_GET["mail"];
  $pass = $_GET["pass"];

  $dom = new DOMDocument;
  $dom->loadXML('korisnici.xml');
  $korisnici = $dom->getElementsByTagName("korisnik");
  $korisnik = $korisnici[0]->nodeValue;

  $i = 0;
  $mailB = false;
  $passB = false;
  foreach($korisnik as $a)  {
    if($i == 0) {
      if($a->nodeValue == $mail) {
        $mailB = true;
      }
      else {
        break;
      }
    }
    elseif ($i == 4) {
      if($a->nodeValue == $pass){
        $passB = true;
      }
    }
    $i++;
  }
if ($mailB && $passB) {
  echo '<div class="adminFormaDiv">
            <a id = "preusmjeriNaDodavanjeIgre"
            href = "dodajIgru.html"> Dodaj igru </a>
          </div>';
}

  /*$korisnici = $dom->getElementsByTagName("korisnik");
  $admin = $korisnici[0];

  if($admin::getAtt && $admin->password == $pass) {
    echo '<div class="adminFormaDiv">
              <a id = "preusmjeriNaDodavanjeIgre"
              href = "dodajIgru.html"> Dodaj igru </a>
            </div>';
  }
*/
  /*$korisnik = $dom->korisnici;
  foreach($korisnik as $k)
    {
      if($k->email == $mail && $k->password == $pass) {
        echo '    <div class="adminFormaDiv">
                  <a id = "preusmjeriNaDodavanjeIgre"
                  href = "dodajIgru.html"> Dodaj igru </a>
                </div>';
                break;
      }
      else {
        echo "";
        break;
      }
    }*/
 ?>
