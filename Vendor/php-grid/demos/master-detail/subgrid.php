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
				
$grid = new jqgrid($db_conf);

$opt["caption"] = "Clients Data";
$opt["height"] = "";
$opt["rowNum"] = "5";

// following params will enable subgrid -- by default 'rowid' (PK) of parent is passed
$opt["subGrid"] = true;
$opt["subgridurl"] = "subgrid_detail.php";

// call some JS on subgrid load
// $opt["subGridRowExpanded"] = "function(){ setTimeout(function(){ alert('connect ckeditor code'); },200);  }";

// $opt["loadComplete"] = "function(){ expand_all(); }";

// disable subgrid on row id:2
$opt["loadComplete"] = "function(){ var rowid=2; 
									jQuery('tr#'+rowid+' td[aria-describedby$=subgrid]').html(''); 
									jQuery('tr#'+rowid+' td[aria-describedby$=subgrid]').unbind(); 
									 }"; 

$opt["subgridparams"] = "name,gender,company"; // comma sep. fields. will be POSTED from parent grid to subgrid, can be fetching using $_POST in subgrid
$grid->set_options($opt);

$grid->table = "clients";

$grid->set_actions(array(
						"add"=>true, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"search" => "advance", // show single/multi field search condition (e.g. simple or advance)
						"showhidecolumns" => false
					)
				);

$out = $grid->render("list1");
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

		
	<script src="//cdn.jsdelivr.net/jstorage/0.1/jstorage.min.js" type="text/javascript"></script>	
	<script src="//cdn.jsdelivr.net/json2/0.1/json2.min.js" type="text/javascript"></script>
	<script src="//cdn.rawgit.com/gridphp/jqGridState/03b2bd484aecf8f47c810e7ba60606fe1a6fb7ec/jqGrid.state.js" type="text/javascript"></script>

	<script>
	var opts = {
		"stateOptions": {         
					storageKey: "gridState-list-xa",
					columns: true, // remember column chooser settings
					selection: false, // row selection
					expansion: false, // subgrid expansion
					filters: false, // subgrid expansion
					pager: false, // page number
					order: false // field ordering
		}
	};
	</script>
	
</head>
<body>
	<div style="margin:10px">
	Subgrid example ... this file will load subgrid defined in 'subgrid_detail.php'
	<br>
	<br>
	<?php echo $out?>
	</div>
	<script type="text/javascript">
	
	function expand_all()
	{
		var rowIds = jQuery("#list1").getDataIDs();
		jQuery.each(rowIds, function (index, rowId) { jQuery("#list1").expandSubGridRow(rowId); });
	}
	
	jQuery(document).ready(function(){

		jQuery('#list1').jqGrid('navButtonAdd', '#list1_pager',
		{
			'caption'      : 'Toggle Expand',
			'buttonicon'   : 'ui-icon-plus',
			'onClickButton': function()
			{

				var rowIds = jQuery("#list1").getDataIDs();

				if ( ! jQuery(document).data('expandall') )
				{
					jQuery.each(rowIds, function (index, rowId) { jQuery("#list1").expandSubGridRow(rowId); });
					jQuery(document).data('expandall',1);
				}
				else
				{
					jQuery.each(rowIds, function (index, rowId) { jQuery("#list1").collapseSubGridRow(rowId); });
					jQuery(document).data('expandall',0);
				}

			},
			'position': 'last'
		});
	});
	</script>

</body>
</html>