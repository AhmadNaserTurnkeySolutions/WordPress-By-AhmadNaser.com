<?php
/*
Template Name: Planets
*/
?>
<?php require_once('Connections/connTPA.php'); ?>
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

mysql_select_db($database_connTPA, $connTPA);
$query_rsPlanet = "SELECT * FROM planets ORDER BY planetName ASC";
$rsPlanet = mysql_query($query_rsPlanet, $connTPA) or die(mysql_error());
$row_rsPlanet = mysql_fetch_assoc($rsPlanet);
$totalRows_rsPlanet = mysql_num_rows($rsPlanet);
?>
<?php get_header(); ?>
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
        <?php wp_reset_query(); ?>
        <?php do { ?>
          <a href="index.php?page_id=142&amp;id=<?php echo $row_rsPlanet['id']; ?>"><?php echo $row_rsPlanet['planetName']; ?></a><br />
          <?php } while ($row_rsPlanet = mysql_fetch_assoc($rsPlanet)); ?>
    </div> <!-- end contentWrap -->
<?php get_sidebar(); ?>
</div> <!-- end content -->
<?php get_footer(); ?>
<?php
mysql_free_result($rsPlanet);
?>
