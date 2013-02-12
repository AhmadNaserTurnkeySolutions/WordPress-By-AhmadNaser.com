<?php
/*
Template Name: Planet
*/
?>
<?php get_header(); ?>
<?php require_once('connTPA.php'); ?>
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

<div id="contentWrap">
    <div id="content">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <h2><?php the_title(); ?>
                    </h2>
                    <div class="meta">
                        <?php the_time('F jS, Y') ?>
                    </div>
                    <div class="entry">
                        <?php the_content(); ?>
                    </div>
                    <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
                </article>
			<?php endwhile; ?>
        <?php else : ?>
            <h2>Not Found</h2>
        <?php endif; ?>
        <?php wp_reset_query() ?>
        <table width="500" border="0">
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
    </div> <!-- end contentWrap -->
<?php get_sidebar('explorers'); ?>
</div> <!-- end content -->
<?php get_footer(); ?>
<?php
mysql_free_result($rsPlanets);
?>
