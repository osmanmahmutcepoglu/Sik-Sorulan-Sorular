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

$grid["sortname"] = 'id'; // by default sort grid by this field
$grid["sortorder"] = "desc"; // ASC or DESC
$grid["caption"] = "Invoice Data"; // caption of grid
$grid["autowidth"] = true; // expand grid to screen width
$grid["edit_options"]["afterShowForm"] = "function(){ disable_options(); }"; // expand grid to screen width

// reset select2 searchfilter 'client_id' on reload
$grid["loadComplete"] = "function(){ $('#gs_client_id').trigger('change'); }"; 
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

$col = array();
$col["title"] = "Id"; // caption of column
$col["name"] = "id"; 
$col["width"] = "10";
$cols[] = $col;		

$col = array();
$col["title"] = "Client";
$col["name"] = "client_id";
$col["dbname"] = "invheader.client_id"; // this is required as we need to search in name field, not id
$col["width"] = "100";
$col["align"] = "left";
$col["search"] = true;
$col["editable"] = true;

# fetch data from database, with alias k for key, v for value
$str = $g->get_dropdown_values("select distinct client_id as k, name as v from clients");

$col["edittype"] = "select"; // render as select
$col["editoptions"] = array("value"=>$str);

$col["editoptions"]["dataInit"] = "function(){ setTimeout(function(){ link_select2('{$col["name"]}'); },200); }";

$col["stype"] = "select"; // render as select
$col["searchoptions"] = array("value"=>$str); 
$col["searchoptions"]["dataInit"] = "function(){ setTimeout(function(){ link_select2('gs_{$col["name"]}'); },200); }";
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
$col["formatter"] = "autocomplete"; // autocomplete
$col["formatoptions"] = array("sql"=>"SELECT amount as v FROM invheader", "update_field"=>"amount"); // typeahead same field
$cols[] = $col;

$col = array();
$col["title"] = "Note";
$col["name"] = "note"; 
$col["width"] = "50";
$col["editable"] = true; // this column is editable
$col["editoptions"] = array("size"=>20); // with default display of textbox with size 20
$cols[] = $col;

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

	<!--link href="../../lib/js/integration/select2/4.0.4/select2.min.css" rel="stylesheet" />
	<script src="../../lib/js/integration/select2/4.0.4/select2.min.js"></script-->
		
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	
</head>
<body>
	<div style="margin:10px">
	<?php echo $out?>
	</div>

	<script>
	function link_select2(id)
	{
		$('select[name='+id+'].editable, select[id='+id+']').select2(
															{	
																onSelect: function()
																{
																	jQuery(this).trigger('change'); 
																},
																templateResult: formatTemplate
															});
		$(document).unbind('keypress').unbind('keydown');
		
		$('select[name='+id+'].editable, select[id='+id+']').on("select2:select", function (evt) {
			  var element = evt.params.data.element;
			  var $element = $(element);
			  $element.detach();
			  $(this).append($element);
			  $(this).trigger("change");
			});		
	}
	
	function formatTemplate (data) {

		if (!data.id) {
			return data.text;
		}
		
		var baseUrl = "http://lorempixel.com/32/32/nature?id=";
		var $state = $('<span><img src="' + baseUrl + data.id + '.png" /> ' + data.text + '</span>');
		
		return $state;
	};	
	
	function disable_options()
	{
		var id = 'client_id';
		$('select[name='+id+'].editable option[value="1"]').prop('disabled',true);
		$('select[id='+id+'] option[value="1"]').prop('disabled',true);
		
		link_select2('client_id');
	}
	
	</script>

	</body>
</html>



