<?php 
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 2.0.0
 * @license: see license.txt included in package
 */
 
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
				
// first grid
$grid = new jqgrid($db_conf);
$opt["caption"] = "Clients Data";
$grid->set_options($opt);
$grid->table = "clients";


$e["js_on_load_complete"] = "grid_load";
$grid->set_events($e);

// generate grid output, with unique grid name as 'list1'
$out_master = $grid->render("list1");

// second grid
$grid = new jqgrid($db_conf);

$opt["sortname"] = 'id'; // by default sort grid by this field
$opt["sortorder"] = "desc"; // ASC or DESC
$opt["height"] = ""; // autofit height of subgrid
$opt["caption"] = "Invoice Data"; // caption of grid
$opt["width"] = 900; // expand grid to screen width
$opt["multiselect"] = true; // allow you to multi-select through checkboxes
$opt["export"] = array("filename"=>"my-file", "sheetname"=>"test"); // export to excel parameters
$grid->set_options($opt);

$grid->set_actions(array(	
						"add"=>true, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"export"=>true, // show/hide export to excel option
						"autofilter" => true, // show/hide autofilter for search
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
					) 
				);

// this db table will be used for add,edit,delete
$grid->table = "invheader";

// generate grid output, with unique grid name as 'list2'
$out_detail = $grid->render("list2");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/themes/redmond/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/jqgrid/css/ui.jqgrid.css"></link>	
	
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="../../lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
	
	<!-- Add fancyBox main JS and CSS files -->
	<link type="text/css" rel="stylesheet" href="//cdn.jsdelivr.net/fancybox/2.1.4/jquery.fancybox.css" />
	<script type="text/javascript" src="//cdn.jsdelivr.net/fancybox/2.1.4/jquery.fancybox.js"></script>
	
</head>
<body>
	
	<div style="margin:10px">
		Second Grid with fancy box and toolbar button
		<br>
		<br>
		<?php echo $out_master ?>

		<div id="div_second" style="display:none">
		<?php echo $out_detail?>
		</div>
	</div>
	<script>
	jQuery(document).ready(function()
	{
		// custom button task log grid
		jQuery('#list1').jqGrid('navButtonAdd', '#list1_pager', 
		{
			'caption'      : 'Second Grid', 
			'buttonicon'   : 'ui-icon-extlink', 
			'onClickButton': function()
			{
				jQuery('#div_second').trigger("reloadGrid",[{page:1}]);
				jQuery.fancybox.open({href: "#div_second"});
							
			},
			'position': 'last'
		});
		
	});
	</script>
</body>
</html>