<?php
/**
 * pripojenie db
 * @param  [string] $name
 * @param  [string] $password
 * @return [object]
 */
function connectDB($name, $password)
{
    $con=mysql_connect("sql1.webzdarma.cz", $name, $password, $name);
    if (!$con)
        return;

    if (!mysql_select_db('galavecerxfc8938', $con))
        return;

    return $con;
}

/**
 * tvori nove ID na zaklade posledneho ID v tabulke
 *
 * @param  Object $con pripojenie
 * @return Number nove id
 */
function getNewID($con)
{
    $res = mysql_query("SELECT MAX(ID) AS ID FROM Movies", $con);
    $res = mysql_fetch_assoc($res);

    $res = $res["ID"];
    return $res + 1;
}

/**
 * vlozi do db argumenty ako novy zaznam
 * @param  [Object] $con
 * @param  [string] $id
 * @param  [String] $name
 * @param  [String] $director
 * @param  [string] $country
 * @param  [string] $genre
 * @param  [string] $review
 * @return [error string]
 */
function insertDB($con, $id, $name, $director, $country, $genre, $review)
{
  $query = $id."','".$name."','". $genre."','".$director."','".$country."','".$review;
  $res = mysql_query("INSERT INTO Movies (ID, NAME, Genre, Director, Country, Review) VALUES('" . $query . "')", $con);
  return mysql_error($con);
}

/**
 * vymaze zaznam z db na zaklade jeho id
 * @param  [object] $con
 * @param  [int] $id
 * @return error string
 */
function deleteDB($con, $id)
{
  mysql_query("DELETE FROM Movies WHERE ID= '".$id."' ",$con);
  return mysql_error($con);
}
/**
 * na zaklade id vyberie zaznam z db a vrati ho
 * @param  [int] $id
 * @param  [object] $con
 * @return object
 */
function getRecordById($id, $con)
{
  $query="SELECT * FROM Movies WHERE ID='".$id."'";
  $res = mysql_query($query, $con);

  return mysql_fetch_assoc($res);
}

/**
 * prepise zaznam na zaklade ID info z formulara na update
 * @param  [object] $con      
 * @param  [string] $id
 * @param  [string] $name
 * @param  [string] $director
 * @param  [string] $country
 * @param  [string] $genre
 * @param  [string] $review
 * @return error string
 */
function updateDb ($con, $id, $name, $director, $country, $genre, $review)
{
  $res= mysql_query("UPDATE Movies SET NAME = '".$name."', Genre = '".$genre."', Director = '".$director."', Country = '".$country."', Review = '".$review."' WHERE ID = '".$id."'", $con);
  return mysql_error($con);
}
?>
