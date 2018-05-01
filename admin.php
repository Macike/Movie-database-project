<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Movie admin</title>
        <meta name="description" content="The HTML5 Herald">
        <meta name="Machine Monitor" content="event display">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/custom.css">
    </head>
    <body>

      <?php
      if (!isset($_POST["Name"]) && !isset($_POST["pass"]))
      {
          echo "<div class=\"container text-center\"> ";
          echo "<form method=\"post\" action=\"#\">";
          echo "</br><label> Meno: </label>";
          echo  "<input type=\"text\" name='Name'></br>";
          echo "<label> Heslo: </label>";
          echo "<input type=\"password\" name='pass'></br>";
          echo "<input type=\"submit\" class=\"btn\" value=\"Submit\"></br>";
          echo "</form></br>";
          echo " </div>";
      }
      else
      {
        $pass = "admin";
        $name = "admin";

        if ($pass == $_POST["pass"] && $name == $_POST["Name"])
        {
          /*TABULKA*/
          echo "<div class=\"container text-center\"> ";
            echo "<div class=\"row text-center bg\"> ";
                echo "<div class=\"offset-1 col-2 text-center\"> Meno : </div> ";
                echo "<div class=\"col-2 text-center\"> Žáner : </div> ";
                echo "<div class=\"col-2 text-center\"> Režisér : </div> ";
                echo "<div class=\"col-2 text-center\"> Krajina : </div> ";
                echo "<div class=\"col-2 text-center\"> Hodnotenie : </div> ";

            echo "</div>";

          $con=mysql_connect("sql1.webzdarma.cz","galavecerxfc8938","F9feEBO","galavecerxfc8938");
          if (!$con)
          {
              echo "Failed to connect to MySQL: " . mysql_connect_error();
              exit;
          }

          if (!mysql_select_db('galavecerxfc8938', $con))
          {
              echo 'Could not select database';
              exit;
          }

          $res = mysql_query("SELECT * FROM Movies", $con);
          if (!$res)
          {
              echo "No results";
              exit;
          }
          echo "<div class='row text-center bg2'>";
          while ($row = mysql_fetch_assoc($res))
          {
              echo "<div class='offset-1 col-2 '>" . $row["NAME"] . "</div>";
              echo "<div class='col-2'>" . $row["Genre"] . "</div>";
              echo "<div class='col-2'>" . $row["Director"] . "</div>";
              echo "<div class='col-2'>" . $row["Country"] . "</div>";
              echo "<div class='col-2'>" . $row["Review"] . "</div>";
          }
          echo "</div>";
          echo "</div>";
        }
        else
        {
            echo "<div class=\"container text-center\"> ";
            echo " fatal error fail";
            echo "<form method=\"post\" action=\"#\">";
            echo "</br><label> Meno: </label>";
            echo  "<input type=\"text\" name='Name'></br>";
            echo "<label> Heslo: </label>";
            echo "<input type=\"password\" name='pass'></br>";
            echo "<input type=\"submit\" class=\"btn\" value=\"Submit\">";
            echo "</form></br>";
            echo "</div>";
        }
      }
?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
