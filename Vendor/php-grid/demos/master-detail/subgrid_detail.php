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

// passed from parent grid
$c_id = $_REQUEST["rowid"];
$gender = $_REQUEST["gender"];
if (empty($c_id)) $c_id = 0;

// you can customize your own columns ...

$col = array();
$col["title"] = "Id"; // caption of column
$col["name"] = "id"; // field name, must be exactly same as with SQL prefix or db field
$col["width"] = "10";
$cols[] = $col;

$col = array();
$col["title"] = "Client Id";
$col["name"] = "c.client_id";
$col["width"] = "10";
$col["editable"] = true;
$col["hidden"] = true;
$col["editoptions"] = array("defaultValue" => $c_id); // set default value
$cols[] = $col;

$col = array();
$col["title"] = "Date";
$col["name"] = "invdate";
$col["width"] = "50";
$col["editable"] = true; // this column is editable
$col["editoptions"] = array("size"=>20); // with default display of textbox with size 20
$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array();
$col["title"] = "Client";
$col["name"] = "name";
$col["width"] = "100";
$col["editable"] = false; // this column is not editable
$cols[] = $col;

$col = array();
$col["title"] = "Note";
$col["name"] = "note";
$col["width"] = "100"; // not specifying width will expand to fill space
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["editable"] = true;
$col["edittype"] = "file"; // render as file
$col["upload_dir"] = "temp"; // upload here
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
$col["editoptions"] = array("value"=>"Yes:No"); // with these values "checked_value:unchecked_value"
$cols[] = $col;

// custom data (if passed) need to be filled in URL as query string ($_REQUEST);
//$grid["url"] = "subgrid_detail.php?rowid=".$_REQUEST["rowid"]."&subgrid=".$_REQUEST["subgrid"]."&gender=".$_REQUEST["gender"];

// if no custom param, it is auto set inside lib -- dont need to set
//$grid["url"] = "subgrid_detail.php?rowid=".$_REQUEST["rowid"]."&subgrid=".$_REQUEST["subgrid"];

$grid["sortname"] = 'id'; // by default sort grid by this field
$grid["sortorder"] = "desc"; // ASC or DESC
$grid["height"] = ""; // autofit height of subgrid
$grid["caption"] = "Invoice Data"; // caption of grid
$grid["autowidth"] = true; // expand grid to screen width
$grid["multiselect"] = true; // allow you to multi-select through checkboxes
$grid["export"] = array("filename"=>"my-file", "sheetname"=>"test"); // export to excel parameters
$grid["subGrid"] = true;
$grid["footerrow"] = true;
$grid["subgridurl"] = "subgrid_sub_detail.php";
// $grid["subgridparams"] = "closed"; // extra data for sub grid

// $grid["cellEdit"] = true;
// to refresh parent after subgrid edit
// $grid["afterSubmitCell"] = "function(serverresponse, rowid, cellname, value, iRow, iCol) { jQuery('#list1').trigger('reloadGrid',[{jqgrid_page:1}]); return [true, '']; }";

// reload parent after delete
$grid["delete_options"]["afterSubmit"] = "function(){ jQuery('#list1').trigger('reloadGrid',[{jqgrid_page:1}]); return [true, ''];}";

// reload parent on update
$grid["onAfterSave"] = "function(){ jQuery('#list1').trigger('reloadGrid',[{jqgrid_page:1}]); }";

// reload parent on add
$grid["add_options"]["afterSubmit"] = "function(){jQuery('#list1').trigger('reloadGrid',[{jqgrid_page:1}]); return [true, ''];}";

// highlight after add
$grid["add_options"]["afterComplete"] = "function (response, postdata) { r = JSON.parse(response.responseText); jQuery('#'+r.id,'#list1').effect('highlight', {color:'yellow'}, 2000); }";

$g->set_options($grid);

$g->set_actions(array(
						"add"=>false, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>false, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"export"=>false, // show/hide export to excel option
						"autofilter" => true, // show/hide autofilter for search
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
					)
				);

// you can provide custom SQL query to display data
$g->select_command = "select i.id, i.client_id, i.invdate, c.name,
						i.note, i.total, i.closed FROM invheader i
						INNER JOIN clients c ON c.client_id = i.client_id
						WHERE c.client_id = $c_id and c.gender='$gender'";

// this db table will be used for add,edit,delete
$g->table = "invheader";

// pass the cooked columns to grid
$g->set_columns($cols);
// group columns header
$g->set_group_header( array(
   "useColSpanStyle"=>true,
   "groupHeaders"=>array(
       array(
           "startColumnName"=>'invdate', // group starts from this column
           "numberOfColumns"=>2, // group span to next 2 columns
           "titleText"=>'Company Details' // caption of group header
       )
   )
)
);

// set footer row
$e["js_on_load_complete"] = "grid_onload_sub";
$g->set_events($e);

// generate grid output, with unique grid name as 'list1'
$out = $g->render("sub1");
?>
<div style="padding:5px">
<?php echo $out; ?>
</div>

<script>
	jQuery(document).ready(function(){
		jQuery('#<?php echo $g->id?>').jqGrid('navButtonAdd', '#<?php echo $g->id?>_pager',
		{
			'caption'      : 'Custom Button',
			'buttonicon'   : 'ui-icon-pencil',
			'onClickButton': function()
			{
				// your custom JS code ...
				window.open("http://google.com");
			},
			'position': 'last'
		});
	});

	function grid_onload_sub(id)
	{
		var grid_id = '<?php echo $g->id?>';
		var grid = jQuery("#"+grid_id);
		var sum = grid.jqGrid('getCol', 'total', false, 'sum');
		sum = parseInt(sum).toFixed(2);
		grid.jqGrid('footerData','set', {total: sum+' &pound;'});
	}
</script>
