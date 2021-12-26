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

// master grid
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
$opt["height"] = "150";

$opt["detail_grid_id"] = "list2";
$opt["subgridparams"] = "client_id,gender,company";
$opt["multiselect"] = true;

// keep multiselect only by checkbox, otherwise single selection
$opt["multiboxonly"] = true;

$grid->set_options($opt);
$grid->table = "clients";

$grid->set_actions(array(
                        "add"=>true, // allow/disallow add
                        "edit"=>true, // allow/disallow edit
						"delete"=>false, // allow/disallow delete
                        "rowactions"=>true, // show/hide row wise edit/del/save option
                        "export"=>true, // show/hide export to excel option
                        "search" => "advance" // show single/multi field search condition (e.g. simple or advance)
                    )
                );

$out_master = $grid->render("list1");

// detail grid
$grid = new jqgrid($db_conf);

// receive id, selected row of parent grid
$id = intval($_GET["rowid"]);
$gender = $_GET["gender"];
$company = utf8_encode($_GET["company"]); // if passed param contains utf8
// $company = urldecode($_GET["company"]); // if passed param contains utf8
// $company = iconv("ISO-8859-1", "UTF-8", $_GET["company"]);

$opt = array();
$opt["datatype"] = "local"; // stop loading detail grid at start
$opt["height"] = ""; // autofit height of subgrid
$opt["caption"] = "Invoice Data"; // caption of grid
$opt["multiselect"] = true; // allow you to multi-select through checkboxes
$opt["reloadedit"] = true; // reload after inline edit

// fill detail grid add dialog with master grid id
$opt["add_options"]["afterShowForm"] = 'function() { var selr = jQuery("#list1").jqGrid("getGridParam","selrow");  var n = jQuery("#list1").jqGrid("getCell",selr,"name");  jQuery("#client_id").val( n ) }';

// reload master after detail update
$opt["onAfterSave"] = "function(){ jQuery('#list1').trigger('reloadGrid',[{current:true}]); }";
$grid->set_options($opt);

// and use in sql for filteration
$grid->select_command = "SELECT id,client_id,invdate,amount,tax,note,total,'$company' as 'company' FROM invheader WHERE client_id = $id";
$grid->table = "invheader";

$col = array();
$col["title"] = "Id"; // caption of column
$col["name"] = "id"; // field name, must be exactly same as with SQL prefix or db field
$col["width"] = "20";
$cols[] = $col;

$col = array();
$col["title"] = "Company"; // caption of column
$col["name"] = "company"; // field name, must be exactly same as with SQL prefix or db field
$col["width"] = "100";
$col["editable"] = false;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>false,"view"=>false);
$cols[] = $col;

$col = array();
$col["title"] = "Client";
$col["name"] = "client_id";
$col["width"] = "100";
$col["align"] = "left";
$col["search"] = true;
$col["editable"] = true;
$col["editoptions"] = array("readonly"=>"readonly", "style"=>"border:0");
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true,"view"=>false);
$cols[] = $col;

$col = array();
$col["title"] = "Date";
$col["name"] = "invdate";
$col["formatter"] = "date";
$col["width"] = "100";
$col["search"] = true;
$col["editable"] = true;
$cols[] = $col;

$col = array();
$col["title"] = "Amount";
$col["name"] = "amount";
$col["width"] = "100";
$col["search"] = true;
$col["editable"] = true;
$cols[] = $col;

$col = array();
$col["title"] = "Total";
$col["name"] = "total";
$col["width"] = "100";
$col["search"] = true;
$col["editable"] = false;
$cols[] = $col;

$col = array();
$col["title"] = "Invoices";
$col["name"] = "note";
$col["width"] = "100";
$col["search"] = true;
$col["editable"] = true;
$col["edittype"] = "select";
$str = $grid->get_dropdown_values("select distinct note as k, note as v from invheader");
$col["editoptions"] = array("value"=>":;".$str);
$cols[] = $col;

$grid->set_columns($cols);

$grid->set_actions(array(
						"add"=>true, // allow/disallow add
                        "edit"=>true, // allow/disallow edit
                        "delete"=>true, // allow/disallow delete
                        "rowactions"=>true, // show/hide row wise edit/del/save option
                        "autofilter" => true, // show/hide autofilter for search
                        "search" => "advance" // show single/multi field search condition (e.g. simple or advance)
                    )
                );

$e["on_insert"] = array("add_client", null, true);
$e["on_update"] = array("update_client", null, true);
$grid->set_events($e);

function add_client(&$data)
{
    $id = intval($_GET["rowid"]);
    $data["params"]["client_id"] = $id;
    $data["params"]["total"] = $data["params"]["amount"] + $data["params"]["tax"];
}

function update_client(&$data)
{
    $id = intval($_GET["rowid"]);
    $g = $_GET["gender"] . ' client note';
    $data["params"]["note"] = $g;
    $data["params"]["client_id"] = $id;
    $data["params"]["total"] = $data["params"]["amount"] + $data["params"]["tax"];
}

// generate grid output, with unique grid name as 'list1'
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
</head>
<body>
    <div style="margin:10px">
    Master Detail Grid, on same page
    <br>
    <br>
    <?php echo $out_master ?>
    <br>
    <?php echo $out_detail; ?>
    </div>
</body>
</html>
