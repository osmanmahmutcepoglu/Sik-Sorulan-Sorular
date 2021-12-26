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

$g = new jqgrid($db_conf);

$col = array();
$col["title"] = "Id";
$col["name"] = "id";
$col["width"] = "25";
$cols[] = $col;		

$col = array();
$col["title"] = "Date";
$col["name"] = "invdate"; 
$col["width"] = "100";
$col["formatter"] = "date";
$col["editable"] = true; // this column is editable
$col["editoptions"] = array("size"=>20, "defaultValue" => date("Y-m-d")); 

// date range filter in toolbar
$col["stype"] = "daterange";

// Update options for date range picker: http://tamble.github.io/jquery-ui-daterangepicker/#options
$col["searchoptions"]["opts"] = array("initialText"=>"Select date range...");

// to set custom ranges
// $col["searchoptions"]["opts"]["presetRanges"] = array( array ("text"=>'Test', "dateStart" => "function() { return moment() }", "dateEnd"=>  "function() { return moment().add('weeks', 1).endOf('week'); }" ) );

// Update additional datepicker options: http://api.jqueryui.com/datepicker/#options
// $col["searchoptions"]["opts"]["datepickerOptions"] = array("maxDate"=>"-1d", "numberOfMonths"=>2);

$col["editrules"] = array("required"=>true, "edithidden"=>true); // and is required
$cols[] = $col;

$col = array();
$col["title"] = "Client";
$col["name"] = "client_id";
$col["dbname"] = "c.name"; // this is required as we need to search in name field, not id
$col["width"] = "100";
$col["align"] = "left";
$col["search"] = true;
$col["editable"] = true;
$col["edittype"] = "select"; // render as select
$str = $g->get_dropdown_values("select distinct client_id as k, name as v from clients");
$col["editoptions"] = array("value"=>":;".$str); 
$col["formatter"] = "select"; // display label, not value
$cols[] = $col;

$col = array();
$col["title"] = "Note";
$col["name"] = "note";
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["editable"] = true;
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes
$cols[] = $col;

$col = array();
$col["title"] = "Total";
$col["name"] = "total";
$col["width"] = "50";
$col["editable"] = true;
$cols[] = $col;

$col = array();
$col["title"] = "Closed";
$col["name"] = "closed";
$col["width"] = "50";
$col["editable"] = true;
$col["edittype"] = "checkbox"; // render as checkbox
$col["editoptions"] = array("value"=>"1:0"); // with these values "checked_value:unchecked_value"
$col["formatter"] = "checkbox";
$cols[] = $col;


$grid["rowNum"] = 10; // by default 20
$grid["sortname"] = 'id'; // by default sort grid by this field
$grid["sortorder"] = "desc"; // ASC or DESC
$grid["caption"] = "Invoice Data"; // caption of grid
$grid["autowidth"] = true; // expand grid to screen width
$grid["multiselect"] = false; // allow you to multi-select through checkboxes
$grid["export"] = array("format"=>"pdf", "filename"=>"my-file", "heading"=>"Invoice Details", "orientation"=>"landscape", "paper"=>"a4");

$g->set_options($grid);

$g->set_actions(array(	
						"add"=>true, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"export"=>true,
						"search" => "advance", // show single/multi field search condition (e.g. simple or advance)
						"showhidecolumns" => false
					) 
				);

// you can provide custom SQL query to display data
$g->select_command = "SELECT i.id, invdate, invdate as invdate2, c.client_id,
						i.note, i.total, i.closed FROM invheader i
						INNER JOIN clients c ON c.client_id = i.client_id";

// this db table will be used for add,edit,delete
$g->table = "invheader";

// pass the cooked columns to grid
$g->set_columns($cols);

// generate grid output, with unique grid name as 'list1'
$out = $g->render("list1");
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
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.rawgit.com/tamble/jquery-ui-daterangepicker/0.5.0/jquery.comiseo.daterangepicker.css"></link>	
	<script src="https://cdn.rawgit.com/tamble/jquery-ui-daterangepicker/0.5.0/jquery.comiseo.daterangepicker.min.js" type="text/javascript"></script>
	
</head>
<body>

	<div style="margin:10px">
	<?php echo $out?>
	</div>
	
	<script>
	// add between operator for search dialog
	$.jgrid.search.odata.push({oper:'bt', text:'between'})
	</script>
	
	<style>
	.comiseo-daterangepicker {
		z-index: 999;
	}	
	.comiseo-daterangepicker-triggerbutton .ui-button-text 
	{
		padding: 0.1em 2.1em 0.1em 1em;
	}
	.comiseo-daterangepicker-triggerbutton.ui-button {
		background: white none repeat scroll 0 0;
		font-weight: normal;
		min-width: 100%;
	}
	.ui-front {
		z-index: 951;
	}
	</style>
	
</body>
</html>
