var errorIcon = document.createElement("img");
errorIcon.setAttribute("src", "Slike/errorIcon.png");
errorIcon.setAttribute("width", "20");
errorIcon.setAttribute("height", "20");

var regMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var regUser = /^\w+$/;
var regSveSlova = /^[a-zA-Z]*$/;

function validirajLogIn() {

  var valja = true;
  var forma = document.getElementById("signInForma");
  var invalidMail = document.getElementById("invalidEmail");
  var invalidPass = document.getElementById("invalidPassword");

  invalidMail.innerHTML = "";
  invalidMail.style.color = "white";
  invalidMail.style.fontSize = "90%";

  invalidPass.innerHTML = "";
  invalidPass.style.color = "white";
  invalidPass.style.fontSize = "90%";

  var mail = forma.emailInput.value;
  var pass = forma.passwordInput.value;

  if(!regMail.test(mail))
    {
      invalidMail.innerHTML = "Unesite odgovarajuci format maila -  nesto@nesto_drugo.com";
      invalidMail.appendChild(errorIcon);
      valja = false;
    }

  if(!pass)
  {
    invalidPass.innerHTML = "Unesite password ! ";
    invalidPass.appendChild(errorIcon);
    valja = false;
  }

  if(pass.length < 8)
  {
    invalidPass.innerHTML = "Password je prekratak ! ";
    invalidPass.appendChild(errorIcon);
    valja = false;
  }

  logujKorisnika(mail, pass);

  return valja;
}

function logujKorisnika(mail, pass) {
  var parametri =
  "mail="+mail+
  "&pass="+pass;

  var ajax = new XMLHttpRequest();
  ajax.onreadystatechange= function() {
    if(this.readyState == 4 && this.status == 200)  {
      alert(ajax.responseText);
      alert("Logovan");
      document.getElementById("ostatakIgre").innerHTML = ajax.responseText;
    }

  };
  ajax.open("post", "dodajDodavanjeIgre.php?"+parametri, true);
  ajax.send();

}


function validirajSignUp()  {
  var valja = true;
  var forma = document.getElementById("signUpForma");

  var mailDiv = document.getElementById("emailKorisnikaDiv");
  var userDiv = document.getElementById("displayNameDiv");
  var imeDiv = document.getElementById("imeKorisnikaDiv");
  var prezimeDiv = document.getElementById("prezimeKorisnikaDiv");
  var passDiv = document.getElementById("passwordKorisnikaDiv");
  var passRepeatDiv = document.getElementById("passwordKorisnikaRepeatDiv");

  mailDiv.innerHTML = "";
  mailDiv.style.color = "white";
  mailDiv.style.fontSize = "90%";

  userDiv.innerHTML = "";
  userDiv.style.color = "white";
  userDiv.style.fontSize = "90%";

  imeDiv.innerHTML = "";
  imeDiv.style.color = "white";
  imeDiv.style.fontSize = "90%";

  prezimeDiv.innerHTML = "";
  prezimeDiv.style.color = "white";
  prezimeDiv.style.fontSize = "90%";

  passDiv.innerHTML = "";
  passDiv.style.color = "white";
  passDiv.style.fontSize = "90%";

  passRepeatDiv.innerHTML = "";
  passRepeatDiv.style.color = "white";
  passRepeatDiv.style.fontSize = "90%";


    var mail = forma.emailKorisnika.value;
    var user = forma.displayName.value;
    var ime = forma.imeKorisnika.value;
    var prezime = forma.prezimeKorisnika.value;
    var pass = forma.passwordKorisnika.value;
    var passRepeat = forma.passwordKorisnikaRepeat.value;

  if(!regMail.test(mail)) {
        mailDiv.innerHTML = "Unesite odgovarajuci format maila -  nesto@nesto_drugo.com";
        mailDiv.appendChild(errorIcon);
        return false;
    }
  if(!regUser.test(user) && user) {
    userDiv.innerHTML = "Username smije sadrzavati slova, brojeve i znak '-'";
    userDiv.appendChild(errorIcon);
    return false;
  }
  if(!ime)  {
    imeDiv.innerHTML = "Unesite ime ! ";
    imeDiv.appendChild(errorIcon);
    return false;
  }
  if(!regSveSlova.test(ime))  {
    imeDiv.innerHTML = "Ime mora da sadrzi samo slova !";
    imeDiv.appendChild(errorIcon);
    return false;
  }
  if(!prezime)  {
    prezimeDiv.innerHTML = "Unesite prezime !";
    prezimeDiv.appendChild(errorIcon);
    return false;
  }
  if(!regSveSlova.test(prezime))  {
    prezimeDiv.innerHTML = "Prezime mora da sadrzi samo slova !";
    prezimeDiv.appendChild(errorIcon);
    return false;
  }
  if(!pass) {
      passDiv.innerHTML = "Unesite password ! ";
      passDiv.appendChild(errorIcon);
      return false;
    }
  if(pass.length < 8) {
      passDiv.innerHTML = "Password je prekratak ! ";
      passDiv.appendChild(errorIcon);
      return false;
    }
  if(!regUser.test(pass)) {
    passDiv.innerHTML = "Password mora da sadrzi samo slova, brojeva i eventualno znak ''-''";
    passDiv.appendChild(errorIcon);
    return false;
  }
  if(!passRepeat) {
    passRepeatDiv.innerHTML = "Molimo ponovite password ! ";
    passRepeatDiv.appendChild (errorIcon);
    return false;
  }
  if(pass != passRepeat && passRepeat)  {
    passRepeatDiv.innerHTML = "Passwordi se ne poklapaju";
    passRepeatDiv.appendChild(errorIcon);
    return false;
  }

  dodajKorisnika(mail, user, ime, prezime, pass);
}

function dodajKorisnika(mail, user, ime, prezime, pass) {
  var parametri =
  "mail="+mail+
  "&user="+user+
  "&ime="+ime+
  "&prezime="+prezime+
  "&pass="+pass;
  var ajax = new XMLHttpRequest();
  ajax.onreadystatechange= function() {
    if(this.readyState == 4 && this.status == 200)  {
      alert(ajax.responseText);
    }
  };
  ajax.open("post", "dodajKorisnika.php?"+parametri, true);
  ajax.send();
}

function uvecaj(slika)  {
  document.getElementById("modal").style.display = "block";
  document.getElementById("uvecanaSlika").src = slika;
}

window.onkeydown = function(key) {
  if(key.keyCode == 27) {
    document.getElementById("modal").style.display = "none";
    document.getElementById("uvecanaSlika").src = "";
  }
}

function ucitajN() {

  if(localStorage.emailSignIn!=undefined || localStorage.emailSignIn!=null)
    document.getElementById('emailSignIn').value=localStorage.emailSignIn;

  if(localStorage.passwordSignIn != undefined || localStorage.passwordSignIn != null)
    document.getElementById("passwordSignIn").value = localStorage.passwordSignIn;
}
function upisi(name, value) {
  localStorage.setItem(name, value);
}


function ucitajIgre() {
  var ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function()  {
    if(ajax.readyState == 4 && ajax.status == 200)  {
      //alert(ajax.responseText);
      document.getElementById("igreDiv").innerHTML = ajax.responseText;
    }
  };
  ajax.open("POST", "ucitajIgre.php", true);
  ajax.send();
}
function ucitajDodatke() {
  var ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function()  {
    if(ajax.readyState == 4 && ajax.status == 200)  {
      document.getElementById("accessoriesDiv").innerHTML = ajax.responseText;
    }
  };
  ajax.open("POST", "ucitajDodatke.php", true);
  ajax.send();
}
function ucitajKonzole() {
  var ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function()  {
    if(ajax.readyState == 4 && ajax.status == 200)  {
      document.getElementById("consolesDiv").innerHTML = ajax.responseText;
    }
  };
  ajax.open("POST", "ucitajKonzole.php", true);
  ajax.send();
}

function ucitajSlikeKonzola() {
  var ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function()  {
    if(ajax.readyState == 4 && ajax.status == 200)  {
      document.getElementById("preporukeKonzolaDiv").innerHTML = ajax.responseText;
    }
  };
  ajax.open("POST", "ucitajslikeKonzola.php", true);
  ajax.send();
}

function ucitajSlikeIgara() {
  var ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function()  {
    if(ajax.readyState == 4 && ajax.status == 200)  {
      document.getElementById("preporukeIgaraDiv").innerHTML = ajax.responseText;
    }
  };
  ajax.open("POST", "ucitajSlikeIgara.php", true);
  ajax.send();
}

function ucitajSlikeDodataka()  {
  var ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function()  {
    if(ajax.readyState == 4 && ajax.status == 200)  {
      document.getElementById("preporukeDodatakaDiv").innerHTML = ajax.responseText;
    }
  };
  ajax.open("POST", "ucitajSlikeDodataka.php", true);
  ajax.send();
}

function ucitajDodavanjeIgre()  {
  window.location.href = "localhost/wt/Zadaca/dodajIgru.html";
}

function xmlToDB()  {
  var ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function()  {
    if(ajax.readyState == 4 && ajax.status == 200)  {
    }
  };
  ajax.open("POST", "xmlToDB.php", true);
  ajax.send();
}



/*
function ucitaj(podStranicu) {
  var ajax = new XMLHttpRequest();

  ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200){
            document.getElementById("ostatak").innerHTML = ajax.responseText;
            if(podStranicu == "signIn.html")
              ucitajN();
          }
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById("ostatak").innerHTML = podStranicu;
    }
    ajax.open("GET", podStranicu, true);
    ajax.send();
  }
  */
