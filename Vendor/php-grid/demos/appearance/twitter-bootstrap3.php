<?php
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 2.0.0
 * @license: see license.txt included in package
 */

 //http://www.ok-soft-gmbh.com/jqGrid/FontAwesome4_Bootstrap3_.htm
 //http://www.ok-soft-gmbh.com/jqGrid/FontAwesome4_.htm
 
// include db config
include_once("../../config.php");

// include and create object
include(PHPGRID_LIBPATH."inc/jqgrid_dist.php");

// Database config file to be passed in phpgrid constructor
$db_conf = array( 	
					"type" 		=> PHPGRID_DBTYPE, 
					"server" 	=> PHPGRID_DBHOST,
					"user" 		=> PHPGRID_DBUSER,
					"password" 	=> PHPGRID_DBPASS,
					"database" 	=> PHPGRID_DBNAME
				);


$g = new jqgrid($db_conf);
// set table for CRUD operations
$g->table = "clients";
$grid["caption"] = "Grid 1";
$grid["autowidth"] = true;
$grid["toolbar"] = "bottom";
$grid["autoresize"] = true; // responsive effect
// required for iphone/safari scroll display
// $grid["height"] = "auto";
$g->set_options($grid);
// render grid
$out1 = $g->render("list1");


$g = new jqgrid($db_conf);
// set table for CRUD operations
$g->table = "invheader";
$grid["caption"] = "Grid 2";
$grid["autowidth"] = true;
$grid["toolbar"] = "bottom";
$grid["autoresize"] = true; // responsive effect
// required for iphone/safari scroll display
// $grid["height"] = "auto";
$g->set_options($grid);
// render grid
$out2 = $g->render("list2");




$black = array("dark-one","metro-black","black-tie","dark-hive","dot-luv","trontastic","vader","ui-darkness");
$white = array("base","material","metro-light","blitzer","south-street","start","cupertino","flick","hot-sneaks","redmond","smoothness");
$mix = array("metro-dark","swanky-purse","eggplant","le-frog","mint-choc","sunny","ui-lightness","pepper-grinder","overcast","humanity","excite-bike");
$wijmo = array("arctic","midnight","aristo","rocket","cobalt","sterling");

$themes = array_merge($black,$white,$mix,$wijmo);

// if set from page
if (is_numeric($_GET["themeid"]))
	$i = $_GET["themeid"];
else
	$i = 0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PHP Grid Control Demos | www.phpgrid.org</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/themes/<?php echo $themes[$i] ?>/jquery-ui.custom.css">

	<!-- bootstrap3 + jqgrid compatibility css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/jqgrid/css/ui.jqgrid.bs.css">	
	
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="../../lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
  </head>

  <body>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
		
				<div style="padding:20px">

					<p>
					<form method="get">
					Choose Theme: <select name="themeid" onchange="form.submit()">
						<?php foreach($themes as $k=>$t) { ?>
							<option value=<?php echo $k?> <?php echo ($i==$k)?"selected":""?>><?php echo ucwords($t)?></option>
						<?php } ?>
					</select> - 
					You can also have your customized theme (<a href="http://jqueryui.com/themeroller">jqueryui.com/themeroller</a>).
					</form>			
					</p>
							
					<!-- Nav tabs -->
					<ul id="bstabs" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
						<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="home"><?php echo $out1?></div>
						<div role="tabpanel" class="tab-pane" id="profile">
							
							<?php echo $out2 ?>
						
						</div>
						<div role="tabpanel" class="tab-pane" id="messages">3...</div>
						<div role="tabpanel" class="tab-pane" id="settings">4...</div>
					</div>

				</div>

			
				<script>
				jQuery('#bstabs a').click(function (e) {
					e.preventDefault()
					jQuery(this).tab('show')
				})	
				</script>

				<style>
				.tab-pane {padding:10px;}
				</style>
			</div>
		</div>
	</div>
  </body>
</html>
