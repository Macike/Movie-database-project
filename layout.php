<?php
function addForm()
{
    $form =  "<div class='row backy'>";
    $form .= "<form method='post' action='#'>";
    $form .= "<input type='text' name='NAME' class='formularik'placeholder='Meno'required />";
    $form .= "<input type='text' name='Genre' class='formularik' placeholder='Žáner'required/>";
    $form .= "<input type='text' name='Director' class='formularik'placeholder='Režisér' required/>";
    $form .= "<input type='text' name='Country'class='formularik'placeholder='Krajina' required/>";
    $form .= "<input type='text' name='Review' class='formularik'placeholder='Hodnotenie' maxlength='3' required/>";
    $form .= "<input type='submit' class='btn submit' value='Submit'/>";
    $form .="</form>";
    $form .="</div>";

    return $form;
}

function updateForm($name, $genre, $director, $country, $review)
{
  $form = "<div class='container text-center'>";
  $form .=  "<div class='row backy'>";
  $form .= "<form method='post' action='#'>";
  $form .= "<input type='text' name='name' class='formularik'placeholder='Meno' value='". $name ."' required />";
  $form .= "<input type='text' name='genre' class='formularik' placeholder='Žáner'value='". $genre ."' required/>";
  $form .= "<input type='text' name='director' class='formularik'placeholder='Režisér'value='". $director ."' required/>";
  $form .= "<input type='text' name='country'class='formularik'placeholder='Krajina' value='". $country ."' required/>";
  $form .= "<input type='text' name='review' class='formularik'placeholder='Hodnotenie' maxlength='3'value='". $review ."' required/>";
  $form .= "<input type='submit' class='btn submit' value='Submit'/>";
  $form .="</form>";
  $form .="</div>";
  $form .="</div>";
  return $form;
}

function printDB($con)
{
  $res = mysql_query("SELECT * FROM Movies", $con);
  if(!$res)
     return "No results";

  $layout = "";
  while ($row = mysql_fetch_assoc($res))
  {
      $layout .= "<div class='row text-center bg2'>";
      $layout .= "<div class='offset-1 col-2 '>" . $row["NAME"] . "</div>";
      $layout .= "<div class='col-2'>" . $row["Genre"] . "</div>";
      $layout .=  "<div class='col-2'>" . $row["Director"] . "</div>";
      $layout .= "<div class='col-2'>" . $row["Country"] . "</div>";
      $layout .= "<div class='col-1'>" . $row["Review"] . "</div>";
      $layout .= "<div class='col-1'>";
        $layout .= "<form method='post' action='#'>";
          $layout .= "<input type='text' class='nothere' name='id' readonly value=". $row["ID"] .">";
          $layout .= "<input type='submit' class='btn maz' value='X'>";
        $layout .= "</form>";
      $layout .= "</div>";

      $layout .= "<div class='col-1'>";
        $layout .= "<form method='post' action='#'>";
          $layout .= "<input type='text' class='nothere' name='ide' readonly value=". $row["ID"] .">";
          $layout .= "<input type='submit' class='btn upd' value='U'>";
        $layout .= "</form>";
      $layout .= "</div>";
      $layout .= "</div>";
  }

  $layout .= "</div>";
  return $layout;
}


function printAdmin($fatal)
{
  $addform = "<div class='container text-center'>";
  if($fatal==true)
  {
      $addform .="fatal error fail";
  }

  $addform .="<form method='post' action='#'>";
  $addform .="</br><label> Meno: </label>";
  $addform .="<input type='text' name='Name'></br>";
  $addform .="<label> Heslo: </label>";
  $addform .="<input type='password' name='pass'></br>";
  $addform .="<input type='submit' class='btn' value='Submit'>";
  $addform .="</form></br>";
  $addform .="</div>";

  return $addform;

}

function makingheader()
{
  $header="<div class='row text-center bg'>";
  $header .="<div class='offset-1 col-2 text-center'> Meno : </div>";
  $header .="<div class='col-2 text-center'> Žáner : </div>";
  $header .="<div class='col-2 text-center'> Režisér : </div>";
  $header .="<div class='col-2 text-center'> Krajina : </div>";
  $header .="<div class='col-1 text-center'> Skóre : </div>";
  $header .= "</div>";

  return $header;
}

?>
