<?php require_once('../../../../Connections/connTPA.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_rsPlanets = "-1";
if (isset($_GET['id'])) {
  $colname_rsPlanets = $_GET['id'];
}
mysql_select_db($database_connTPA, $connTPA);
$query_rsPlanets = sprintf("SELECT * FROM planets WHERE id = %s", GetSQLValueString($colname_rsPlanets, "int"));
$rsPlanets = mysql_query($query_rsPlanets, $connTPA) or die(mysql_error());
$row_rsPlanets = mysql_fetch_assoc($rsPlanets);
$totalRows_rsPlanets = mysql_num_rows($rsPlanets);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<style type="text/css">
#planet th {
	text-align: right;
	vertical-align: top;
	padding-right: 5px;
}
</style>
</head>

<body>
<h1>Info on a planet</h1>
<table width="500" border="0" id="planet">
  <tr>
    <th scope="row">Planet:</th>
    <td><?php echo $row_rsPlanets['planetName']; ?></td>
  </tr>
  <tr>
    <th scope="row">Distance from Sun:</th>
    <td><?php echo $row_rsPlanets['planetFromSun']; ?></td>
  </tr>
  <tr>
    <th scope="row">Moons:</th>
    <td><?php echo $row_rsPlanets['planetMoons']; ?></td>
  </tr>
  <tr>
    <th scope="row">Length of Orbit: <br />
      (in Earth Years)</th>
    <td valign="top"><?php echo $row_rsPlanets['planetOrbit']; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsPlanets);
?>
