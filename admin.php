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
      require 'layout.php';
      require 'db.php';

      if (isset($_POST["Name"]) && isset($_POST["pass"]))
      {
          $pass = "admin";
          $name = "admin";

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
          else
          {
            echo printAdmin(true);
          }
      }
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
      else if(isset($_POST['ide']))
      {
        $con = connectDB("galavecerxfc8938", "F9feEBO");

        if(!$con)
            echo "DB connection failed";

        $res = getRecordById($_POST['ide'], $con);
        echo updateForm($res["NAME"], $res["Genre"], $res["Director"], $res["Country"], $res["Review"]);
        mysql_close($con);
      }
      else if(isset($_POST['name']) && isset($_POST['genre']) && isset($_POST['director']) && isset($_POST['country'])&& isset($_POST['review']))
      {
        echo"DATABAZA JEDLO";
      }
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
