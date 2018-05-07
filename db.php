<?php
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
 * Generate new ID based on last ID at tablle
 *
 * @param  Object $con connection
 * @return Number new ID
 */
function getNewID($con)
{
    $res = mysql_query("SELECT MAX(ID) AS ID FROM Movies", $con);
    $res = mysql_fetch_assoc($res);

    $res = $res["ID"];
    return $res + 1;
}

function insertDB($con, $id, $name, $director, $country, $genre, $review)
{
  $query = $id."','".$name."','". $genre."','".$director."','".$country."','".$review;
  $res = mysql_query("INSERT INTO Movies (ID, NAME, Genre, Director, Country, Review) VALUES('" . $query . "')", $con);
  return mysql_error($con);
}

function deleteDB($con, $id)
{
  mysql_query("DELETE FROM Movies WHERE ID= '".$id."' ",$con);
  return mysql_error($con);
}
?>
