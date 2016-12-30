<?php
    $citac = simplexml_load_file("igre.xml");

    foreach($citac as $igra)  {
      echo "<div class = 'igra'>";
      echo "<img class = 'slikaIgre' src =".$igra->slikaIgre." alt=''>";
      echo "<div class = 'opisIgara'>";
      echo "<h1 class = 'naslovIgre'>".$igra->naslovIgre." </h1";
      echo "<p class = 'opisIgre'>";
      echo "<h2 class = 'opisIgreL'> Game description: </h2>";
      echo $igra->opisIgre;
      echo "</p> <br>";
      echo "<p class = 'cijenaIgre'>".$igra->cijenaIgre." </p>";
      echo "</div>";
      echo "</div>";  
    }
 ?>
