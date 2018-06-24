<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Movie admin</title>
        <meta name="description" content="The HTML5 Herald">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/custom.css">
    </head>
    <body>

      <?php
      require 'layout.php';
      require 'db.php';
      // prihlasovanie
      if (isset($_POST["Name"]) && isset($_POST["pass"]))
      {
          $pass = "admin";
          $name = "admin";
          //kontrola spravnosti prihlasovacich udajov ak spravne vypise db
          if ($pass == $_POST["pass"] && $name == $_POST["Name"])
          {

            echo "<div class=\"container text-center\"> ";
            echo addform();
            echo makingheader();

            $con = connectDB("galavecerxfc8938", "F9feEBO");

            if(!$con)
               echo "DB connection failed";

            echo printDB($con);
            mysql_close($con);
          }
          //ak nespravne udaje vypise formular na prihlasenie
          else
          {
            echo printAdmin(true);
          }
      }
      //admin moze pridat do db, db sa vypise aj s novym riadkom
      else if(isset($_POST['NAME']) && isset($_POST['Genre']) && isset($_POST['Director']) && isset($_POST['Country'])&& isset($_POST['Review']))
      {
        $con = connectDB("galavecerxfc8938", "F9feEBO");

        if(!$con)
            echo "DB connection failed";

        $id = getNewID($con);
        insertDB($con, $id, $_POST['NAME'], $_POST['Director'], $_POST['Country'], $_POST['Genre'], $_POST['Review']);

        echo "<div class=\"container text-center\"> ";
        echo addform();
        echo makingheader();

        echo printDB($con);
        mysql_close($con);

      }
      //admin moze mazat z db
      else if(isset($_POST['id']))
      {
        $con = connectDB("galavecerxfc8938", "F9feEBO");

        if(!$con)
            echo "DB connection failed";

        echo deleteDB($con, $_POST['id']);
        echo "<div class=\"container text-center\"> ";
        echo addform();
        echo makingheader();

        echo printDB($con);
        mysql_close($con);

      }
      //admin moze zobrazit udaj z db a prepisat ho
      else if(isset($_POST['ide']))
      {
        $con = connectDB("galavecerxfc8938", "F9feEBO");

        if(!$con)
            echo "DB connection failed";

        $res = getRecordById($_POST['ide'], $con);
        echo updateForm($res["ID"], $res["NAME"], $res["Genre"], $res["Director"], $res["Country"], $res["Review"]);
        mysql_close($con);
      }
      //admin odosle prepisany formular do db a db ho vypise
      else if(isset($_POST['idee']) && isset($_POST['name']) && isset($_POST['genre']) && isset($_POST['director']) && isset($_POST['country']) && isset($_POST['review']))
      {
        $con = connectDB("galavecerxfc8938", "F9feEBO");

        if(!$con)
        {
            echo "DB connection failed";
            exit(0);
        }

        echo updateDb($con, $_POST['idee'], $_POST['name'], $_POST['director'], $_POST['country'], $_POST['genre'], $_POST['review']);
        echo "<div class=\"container text-center\"> ";
        echo addform();
        echo makingheader();
        echo printDB($con);
        mysql_close($con);
      }
      //vypisanie formulara na prihlasenie
      else
      {
        echo printAdmin(false);
      }
?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
