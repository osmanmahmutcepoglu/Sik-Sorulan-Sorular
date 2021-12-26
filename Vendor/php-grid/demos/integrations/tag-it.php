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
$col["title"] = "Id"; // caption of column
$col["name"] = "id"; 
$col["width"] = "15";
$cols[] = $col;		
		
$col = array();
$col["title"] = "Client";
$col["name"] = "client_id";
$col["dbname"] = "invheader.client_id"; // this is required as we need to search in name field, not id
$col["width"] = "50";
$col["align"] = "left";
$col["search"] = true;
$col["editable"] = true;
$col["edittype"] = "select"; // render as select
# fetch data from database, with alias k for key, v for value
$str = $g->get_dropdown_values("select distinct client_id as k, name as v from clients");
$col["editoptions"] = array("value"=>":;".$str); 
$col["editoptions"]["dataInit"] = "function(){ setTimeout(function(){ $('select[name=client_id]').select2({width:'95%'}); },200); }";
$cols[] = $col;

$col = array();
$col["title"] = "Date";
$col["name"] = "invdate"; 
$col["width"] = "50";
$col["editable"] = true; // this column is editable
$col["editoptions"] = array("size"=>20); // with default display of textbox with size 20
$col["editrules"] = array("required"=>true); // and is required
$col["formatter"] = "date"; // format as date
$col["search"] = false;
$cols[] = $col;

$col = array();
$col["title"] = "Amount";
$col["name"] = "amount"; 
$col["width"] = "50";
$col["editable"] = true; // this column is editable
$col["editoptions"] = array("size"=>20); // with default display of textbox with size 20
$cols[] = $col;

$col = array();
$col["title"] = "Note";
$col["name"] = "note"; 
$col["width"] = "150";
$col["editable"] = true; // this column is editable
$col["editoptions"] = array("size"=>20); // with default display of textbox with size 20
$col["editoptions"]["dataInit"] = 'function(el){ setTimeout(function(){ 		
																				// remove nbsp from start
																				if (jQuery(".FormGrid:visible").length) $(el)[0].parentNode.firstChild.remove();
																						
																				$("input[name=note].editable, input[name=note].formElement").tagit({
																							availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
																						}); },200); }';
$cols[] = $col;

$grid["sortname"] = 'id'; // by default sort grid by this field
$grid["sortorder"] = "desc"; // ASC or DESC
$grid["caption"] = "Invoice Data"; // caption of grid
#$grid["autowidth"] = true; // expand grid to screen width

$g->set_options($grid);

$g->set_actions(array(	
						"add"=>false, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"export_pdf"=>true, // show/hide row wise edit/del/save option
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"autofilter" => true, // show/hide autofilter for search
					) 
				);

// to make dropdown work with export, we need clients.name as client_id logic in sql
$g->select_command = "SELECT id, invdate, clients.name as client_id, amount, note FROM invheader 
						INNER JOIN clients on clients.client_id = invheader.client_id
						";

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

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	
	<link href="//cdn.jsdelivr.net/tag-it/2.0/css/jquery.tagit.css" rel="stylesheet"></link>
	<script src="//cdn.jsdelivr.net/tag-it/2.0/js/tag-it.min.js"></script>
	
</head>
<body>
<style>
ul.tagit {
    margin-left: 3px;
    margin-top: 0;
}
</style>
	<div style="margin:10px">
	<?php echo $out?>
	</div>
</body>
</html>
