<?php 
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 2.0.0
 * @license: see license.txt included in package
 
 
 http://easycaptures.com/fs/uploaded/792/1064736792.png
 
 
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
$col["width"] = "10";
$cols[] = $col;		

$col = array();
$col["title"] = "Client";
$col["name"] = "ship_via";
$col["dbname"] = "invheader.ship_via"; // this is required as we need to search in name field, not id
$col["width"] = "100";
$col["align"] = "left";
$col["search"] = true;
$col["editable"] = true;
$col["formatter"] = "select";

$col["edittype"] = "select"; // render as select
# fetch data from database, with alias k for key, v for value
$str = $g->get_dropdown_values("select distinct client_id as k, name as v from clients");
$col["editoptions"] = array("value"=>$str);
$col["editoptions"]["dataInit"] = "function(){ setTimeout(function(){ link_select2('{$col["name"]}'); },200); }";

// to enable multiselect option
$col["editoptions"]["multiple"] = true;

$col["stype"] = "select"; // render as select
$col["searchoptions"] = array("value"=>$str,"sopt"=>array("cn")); 
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
$cols[] = $col;

$col = array();
$col["title"] = "Note";
$col["name"] = "note"; 
$col["width"] = "50";
$col["edittype"] = 'textarea'; 
$col["editable"] = true; // this column is editable
$col["editoptions"] = array("size"=>20); // with default display of textbox with size 20
$cols[] = $col;

$grid["sortname"] = 'id'; // by default sort grid by this field
$grid["sortorder"] = "desc"; // ASC or DESC
$grid["caption"] = "Invoice Data"; // caption of grid
$grid["autowidth"] = true; // expand grid to screen width

$g->set_options($grid);

$g->set_actions(array(	
						"add"=>false, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"export_pdf"=>true, // show/hide row wise edit/del/save option
						"export_excel"=>true, // show/hide row wise edit/del/save option
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"autofilter" => true, // show/hide autofilter for search
					) 
				);

// to make dropdown work with export, we need clients.name as client_id logic in sql
$g->select_command = "SELECT id, invdate, ship_via, amount, note FROM invheader 
						INNER JOIN clients on clients.client_id = invheader.client_id
						";

// this db table will be used for add,edit,delete
$g->table = "invheader";

// pass the cooked columns to grid
$g->set_columns($cols);
		
// customize phpexcel settings
$e["on_render_excel"] = array("custom_export_xls", null);
$e["on_render_pdf"] = array("custom_export_pdf", null);
$g->set_events($e);

// custom on_export callback function
function custom_export_xls($param)
{
	global $g;
	$objPHPExcel = $param["phpexcel"];
	$data = &$param["data"];

	$clients = array();
	$arr = $g->get_all("select distinct client_id, name from clients");
	foreach($arr as $c)
		$clients[$c["client_id"]] = $c["name"];
	
	for($i=1; $i<count($data); $i++)
	{
		$r = &$data[$i];
		
		$ids = explode(",",$r["ship_via"]);
		for($x=0; $x<count($ids); $x++)
			$ids[$x] = $clients[$ids[$x]];

		$r["ship_via"] = implode(",",$ids);
	}
}


function custom_export_pdf($arr)
{
	global $g;
	
	$pdf = $arr["pdf"];
	$data = &$arr["data"];
	
	$clients = array();
	$arr = $g->get_all("select distinct client_id, name from clients");
	foreach($arr as $c)
		$clients[$c["client_id"]] = $c["name"];
	
	for($i=1; $i<count($data); $i++)
	{
		$r = &$data[$i];
		
		$ids = explode(",",$r["ship_via"]);
		for($x=0; $x<count($ids); $x++)
			$ids[$x] = $clients[$ids[$x]];

		$r["ship_via"] = implode(",",$ids);
	}
}

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

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
	
</head>
<body>
	<div style="margin:10px">
	<?php echo $out?>
	</div>

	<script>
	function link_select2(id)
	{
		var el = $('select[id='+id+'].FormElement')[0];
		if (el)
		{
			// remove nbsp; from start of textarea
			if(el.previousSibling) el.parentNode.removeChild(el.previousSibling);
			jQuery(el).parent().css('padding-left','5px');
			jQuery(el).parent().css('padding-bottom','5px');
		}

		$('select[name='+id+'].editable, select[id='+id+']').select2({width:'100%'});
		$(document).unbind('keypress').unbind('keydown');
	}	
	</script>

	</body>
</html>
