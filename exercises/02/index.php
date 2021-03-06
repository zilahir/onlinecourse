<?php

include_once("../../functions.php");

session_start();
if ($_SESSION['login'] == true ) {
} else {
  header("Location: ../../login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Instructions – 02 HTML5</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/exercise.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 exercise-container">
          <h1 class="exercise-title">2. Lecke - HTML5 / CSS alapok</h1>
          <h2>figure, figcaption</h1>
            <div class="bg-warning exercise-warning">
              <p>
                Ne felejts el <code>HTML5</code>-ben deklarálni az oldalt, és létrehozni a <i>csontvázat</i>!
              </p>
              <p>
                Az ellenőrző script a következő fájlokat fogja vizsgálni: <code>exercise_07.html, exercise7.css</code>
              </p>
            </div>
          <div class="exercise-details">
            <p>
              Helyezd el az oldalon <a class="exercise-links" target="_blank" href="http://bit.ly/londonig">ezt</a> a képet.
              <ul>
                <li>
                  Töltsd ki hozzá az <code>alt</code> és a <code>longdesc</code> attribútumokat.
                </li>
                <li>
                  A kép kerüljön a <code>figure</code> tagek közé, és töltsd ki a <code>figcaption</code> attribútumot is.
                </li>
                <li>
                  A kép <code>50%</code>-os kicsinyítésben jelenjen meg, és ha rákattintunk jelenjen meg a kép új ablakban. Használd a <code>kep</code> CSS osztályt.
                </li>
              </ul>
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 exercise-container">
          <h1 class="exercise-title">2. Lecke - HTML5 / CSS alapok</h1>
          <h2>HTML5 tagek feladat</h1>
            <div class="bg-warning exercise-warning">
              <p>
                Ne felejts el <code>HTML5</code>-ben deklarálni az oldalt, és létrehozni a <i>csontvázat</i>!
              </p>
              <p>
                Az ellenőrző script a következő fájlokat fogja vizsgálni: <code>exercise_08.html, exercise8.css</code>
              </p>
            </div>
          <div class="exercise-details">
            <p>
              Valósítsd meg a képen látható oldalt a megfelelő oldalszerkezeti elemek használatával: <code>Main, article, section, aside, nav, header, footer, address</code>
            </p>
            <img class="img-responsive" src="img/structure.png" />
          </div>
          <div class="alert alert-info" role="alert">
            <p>
              <a href="http://textuploader.com/52h1c" class="exercise-links" target="_blank">Ezt</a> a forrást használhatod az átalakításhoz!
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 exercise-container">
          <h1 class="exercise-title">2. Lecke - HTML5 / CSS alapok</h1>
          <h2>Táblázatok kezelése</h1>
            <div class="bg-warning exercise-warning">
              <p>
                Ne felejts el <code>HTML5</code>-ben deklarálni az oldalt, és létrehozni a <i>csontvázat</i>!
              </p>
              <p>
                Az ellenőrző script a következő fájlokat fogja vizsgálni: <code>exercise_09.html, exercise9.css</code>
              </p>
            </div>
          <div class="exercise-details">
            <p>
              Valósítsd meg a képen látható táblázatot. Használd a <code>scope</code> paramétert a fejléc megadásánál.
            </p>
            <img class="img-responsive" src="img/table1.png" />
            <p>
              Fejleszd tovább az oldalt úgy, hogy a <code>thead, tfoot, tbody elemeket is felhasználod.</code>
              A láblécbe írd be, hogy <i>Forrás: Wikipédia</i>
            </p>
          </div>

        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 exercise-container">
          <h1 class="exercise-title">2. Lecke - HTML5 / CSS alapok</h1>
          <h2>Táblázatok kezelése - cellaösszevonás</h1>
            <div class="bg-warning exercise-warning">
              <p>
                Ne felejts el <code>HTML5</code>-ben deklarálni az oldalt, és létrehozni a <i>csontvázat</i>!
              </p>
              <p>
                Az ellenőrző script a következő fájlokat fogja vizsgálni: <code>exercise_10.html, exercise10.css</code>
              </p>
            </div>
          <div class="exercise-details">
            <p>
              Valósítsd meg a képen látható táblázatot.
            </p>
            <img class="img-responsive" src="img/table2.png" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 exercise-container">
          <h1 class="exercise-title">2. Lecke - HTML5 / CSS alapok</h1>
          <h2>Táblázatok kezelése - cellaösszevonás</h1>
            <div class="bg-warning exercise-warning">
              <p>
                Ne felejts el <code>HTML5</code>-ben deklarálni az oldalt, és létrehozni a <i>csontvázat</i>!
              </p>
              <p>
                Az ellenőrző script a következő fájlokat fogja vizsgálni: <code>exercise_11.html, exercise11.css</code>
              </p>
            </div>
          <div class="exercise-details">
            <p>
              Valósítsd meg a képen látható táblázatot <code>CSS</code> használatával, hogy így nézzen ki:
            </p>
            <img class="img-responsive" src="img/table3.png" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 exercise-container">
          <h1 class="exercise-title">2. Lecke - HTML5 / CSS alapok</h1>
          <h2>Űrlapok</h1>
            <div class="bg-warning exercise-warning">
              <p>
                Ne felejts el <code>HTML5</code>-ben deklarálni az oldalt, és létrehozni a <i>csontvázat</i>!
              </p>
              <p>
                Az ellenőrző script a következő fájlokat fogja vizsgálni: <code>exercise_12.html, exercise12.css</code>
              </p>
            </div>
          <div class="exercise-details">
            <p>
              Valósítsd meg a képen látható űrlapot
            </p>
            <img class="img-responsive" src="img/urlap1.png" />
            <ul>
              <li>
                Készítsd el az alábbi űrlapot! A címkét a <code>label</code> taggel add meg és a szövegterület kitöltése kötelező legyen!
              </li>
              <li>
                Az űrlap post metódussal a saját e-mail címedre továbbítódjon!
              </li>
              <li>
                Fejleszd tovább a példát úgy, hogy a <code>fieldset</code> és <code>legend</code>  tageket is használod!
              </li>
              <li>
                Fejleszd tovább a példát úgy, hogy egyszerű szöveges mezőben a Neptun kódot is meg kelljen adni. Ez a mező <code>10</code> karakter széles legyen, de csak <code>6</code> karaktert lehessen begépelni!
              </li>
            </ul>
            <img class="img-responsive" src="img/urlap2.png" />
            <ul>
              <li>
                Fejleszd tovább a példát úgy, hogy a Neptun kód mező csak alfanumerikus karakterekből álló, <code>6</code> karakter hosszú stringet fogadjon el, speciális karaktereket ne!
              </li>
            </ul>
            <div class="alert alert-info" role="alert">
              <p>
                Ehhez a <code>pattern</code> paramétert kell használnod a megfelelően megfogalmazott reguláris kifejezéssel.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 exercise-container">
          <h1 class="exercise-title">2. Lecke - HTML5 / CSS alapok</h1>
          <h2>Űrlapok - regisztrációs form</h1>
            <div class="bg-warning exercise-warning">
              <p>
                Ne felejts el <code>HTML5</code>-ben deklarálni az oldalt, és létrehozni a <i>csontvázat</i>!
              </p>
              <p>
                Az ellenőrző script a következő fájlokat fogja vizsgálni: <code>exercise_12.html, exercise12.css</code>
              </p>
            </div>
          <div class="exercise-details">
            <p>
              Valósítsd meg a képen látható űrlapot:
            </p>
            <img class="img-responsive" src="img/urlap3.png" />
            <ul>
              <li>
                Készítsd el az alábbi űrlapot! A címkét a <code>label</code> taggel add meg és a szövegterület kitöltése kötelező legyen!
              </li>
            </ul>
            <div class="alert alert-info" role="alert">
              <p>
                A szöveget <a href="http://txt.do/auvgb" target="_blank" class="exercise-links">itt</a> találod.
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>

  </body>
</html>
