<?php
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 2.0.0
 * @license: see license.txt included in package
 * SQL: http://pastebin.com/tyChbh4r
 */

include_once("../../config.php");

$db_conf = array();
$db_conf["type"] = "mysqli";
$db_conf["server"] = PHPGRID_DBHOST; 
$db_conf["user"] = PHPGRID_DBUSER; // username
$db_conf["password"] = PHPGRID_DBPASS; // password
$db_conf["database"] = PHPGRID_DBNAME; // database

include(PHPGRID_LIBPATH."inc/jqgrid_dist.php");

$g = new jqgrid($db_conf);
$grid["caption"] = "Sample Grid";
$grid["autowidth"] = true;
$grid["height"] = 'auto';
$grid["sortname"] = 'boss_id';

/*
column: how hierarchical data in this column
id: unique identifier of column
parent: parent id of node
loaded: open tree by default 
*/

$grid["treeGrid"]=true;
$grid["treeConfig"] = array('id'=>'emp_id', 'parent'=>'boss_id', 'loaded'=>false, 'column'=>'name');
$g->set_options($grid);

$g->select_command = "select * from adj_table";
$g->table = "adj_table";

$out = $g->render("list1");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/themes/redmond/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/jqgrid/css/ui.jqgrid.css"></link>	
 
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="../../lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
</head>
<body>
	<div style="margin:10px">
	<?php echo $out?>
	</div>
</body>
</html>
