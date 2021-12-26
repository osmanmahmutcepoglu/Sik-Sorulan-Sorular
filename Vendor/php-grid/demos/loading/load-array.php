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

$g = new jqgrid();

// set few params
$grid["caption"] = "Loading data from Array";
$grid["width"] = 700;
$grid["sortable"] = false;
$grid["multiselect"] = true;
$grid["ignoreCase"] = true; // do case insensitive searching
$grid["export"] = array("format"=>"pdf", "filename"=>"my-file", "heading"=>"Array Data", "orientation"=>"landscape", "paper"=>"a4");
$g->set_options($grid);

$name = array('Pepsi 1.5 Litre', 'Sprite 1.5 Litre', 'Cocacola 1.5 Litre', 'Dew 1.5 Litre', 'Nestle 1.5 Litre');
for ($i = 0; $i < 200; $i++)
{
    $data[$i]['id'] = $i+1;
    $data[$i]['code'] = $name[rand(0, 4)][0].($i+5);
    $data[$i]['name'] = $name[rand(0, 4)];

    // to simulate case insensitive sort
    $data[$i]['name'] = ($i%2)?strtoupper($data[$i]['name']):$data[$i]['name'];

    $data[$i]['cost'] = rand(0, 100)." USD";
    $data[$i]['quantity'] = rand(0, 100);
    $data[$i]['discontinued'] = rand(0, 1);
    $data[$i]['email'] = 'buyer_'. rand(0, 100) .'@google.com';
    // $data[$i]['more_options'] = "<a class='fancybox' href='http://upload.wikimedia.org/wikipedia/commons/4/4a/Logo_2013_Google.png'><img height=25 src='http://ssl.gstatic.com/ui/v1/icons/mail/logo_default.png'></a>";
}

// pass data in table param for local array grid display
$g->table = $data; // blank array(); will show no records

// If you want to customize columns params
$col = array();
$col["title"] = "Id"; // caption of column
$col["name"] = "id"; 
$col["width"] = "60";
$col["frozen"] = true;
$cols[] = $col;		

$col = array();
$col["title"] = "Code"; // caption of column
$col["name"] = "code"; 
$col["width"] = "40";
$col["frozen"] = true;
$cols[] = $col;	

$col = array();
$col["title"] = "Name"; // caption of column
$col["name"] = "name"; 
$col["width"] = "120";
$col["frozen"] = true;
$cols[] = $col;

$col = array();
$col["title"] = "Cost"; // caption of column
$col["name"] = "cost"; 
$col["width"] = "100";
$cols[] = $col;

$col = array();
$col["title"] = "Quantity"; // caption of column
$col["name"] = "quantity"; 
$col["width"] = "100";
$col["sorttype"] = "int";
$cols[] = $col;		

$col = array();
$col["title"] = "Email"; // caption of column
$col["name"] = "email"; 
$col["width"] = "400";
$col["formatter"] = "function(cellvalue, options, rowObject){ return my_custom_link(cellvalue, options, rowObject);}";
$col["unformat"] = "function(cellvalue, options, rowObject){ return cellvalue; }";
$cols[] = $col;		

# Custom made column to show link, must have default value as it's not db driven
$col = array();
$col["title"] = "Details";
$col["name"] = "more_options";
$col["width"] = "30";
$col["align"] = "center";
$col["search"] = false;
$col["sortable"] = false;
$cols[] = $col;

$g->set_columns($cols);

$g->set_actions(array(	
						"add"=>false, // allow/disallow add
						"edit"=>false, // allow/disallow edit
						"delete"=>false, // allow/disallow delete
						"view"=>true, // allow/disallow delete
						"rowactions"=>false, // show/hide row wise edit/del/save option
						"export"=>true, // show/hide export to excel option
						"autofilter" => true, // show/hide autofilter for search
						"search" => false // show single/multi field search condition (e.g. simple or advance)
					) 
				);

// for using custom export
// $e["on_export"] = array("custom_export", null, false);
// $g->set_events($e);

// custom on_export callback function
function custom_export($param)
{
	$arr = $param["data"]; // the data for export
	$grid = $param["grid"]; // the complete grid object reference

	// exporting data code
}

// highlight cell, if defined cellclass OR cellcss
$f = array();
$f["column"] = "name";
$f["op"] = "cn";
$f["value"] = "Pepsi";
$f["cellcss"] = "'background-color':'red', 'color':'white'"; // this also work
$f_conditions[] = $f;

// if nothing set in 'op' and 'value', it will set column formatting for all cell
$f = array();
$f["column"] = "quantity";
$f["css"] = "'background-color':'#FBEC88', 'color':'green', 'font-weight':'bold'"; // must use (single quote ') with css attr and value
$f_conditions[] = $f;

$g->set_conditional_css($f_conditions);


// render grid
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
	
	<link type="text/css" rel="stylesheet" href="//cdn.jsdelivr.net/fancybox/2.1.4/jquery.fancybox.css" />
	<script type="text/javascript" src="//cdn.jsdelivr.net/fancybox/2.1.4/jquery.fancybox.js"></script>
	
</head>
<body>
	<script>
	function my_custom_link(cellvalue, options, rowObject)
	{
		return '<a href="mailto:'+cellvalue+'">'+cellvalue+'</a>';
	}
	</script>
	<div style="margin:10px">
	<?php echo $out?>
	</div>
	<script>
	$(document).ready(function() {
		$('.fancybox').fancybox();
		
		// add toolbar button
		setTimeout("add_tb()",100);
		
	});
	
	function add_tb(){

		jQuery('#list1').jqGrid('navButtonAdd', '#list1_pager', 
		{
			'caption'      : 'Find', 
			'buttonicon'   : 'ui-icon-search', 
			'onClickButton': function()
			{
				// open search dialog via code
				$("#list1").jqGrid ('searchGrid');
			},
			'position': 'last'
		});
	}		
	</script>	
</body>
</html>