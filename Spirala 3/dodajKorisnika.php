<?php
  $mail = $_GET["mail"];
  $user = $_GET["user"];
  $ime = $_GET["ime"];
  $prezime = $_GET["prezime"];
  $pass = md5($_GET["pass"]);

  $postoji = false;
  $xml = simplexml_load_file('korisnici.xml');
  foreach ($xml as $test) {
    if($test->email == $mail) {
      $postoji=true;
      break;
    }
  }

  if(!$postoji) {
  $dom = new DOMDocument();
  $dom->load('korisnici.xml');

  $korisnici = $dom->getElementsByTagName('korisnici');
  $korisnik = $dom->createElement('korisnik');

  $mail1 = $dom->createElement('email');
  $user1 = $dom->createElement('username');
  $ime1 = $dom->createElement('ime');
  $prezime1 = $dom->createElement('prezime');
  $pass1 = $dom->createElement('password');

  $mail1->nodeValue = $mail;
  $user1->nodeValue = $user;
  $ime1->nodeValue = $ime;
  $prezime1->nodeValue = $prezime;
  $pass1->nodeValue = $pass;



  $korisnik->appendChild($mail1);
  $korisnik->appendChild($user1);
  $korisnik->appendChild($ime1);
  $korisnik->appendChild($prezime1);
  $korisnik->appendChild($pass1);

  $korisnici[0]->appendChild($korisnik);

    $dom->save('korisnici.xml');
  }
  //echo $ime.$prezime.$mail.$user.$password;

  //$xml = simplexml_load_file('korisnici.xml');
//  $xml->addChild('nestoBrate');
//  $korisnik = $xml->addChild('korisnik');

//  $korisnik->addChild('mail', $mail);
  //$korisnik->addChild('user', $user);
  //$korisnik->addChild('ime', $ime);
  //$korisnik->addChild('prezime', $prezime);
//  $korisnik->addChild('pass', md5($pass));

  //$xml->asXml('korisnici.xml');
 ?>
