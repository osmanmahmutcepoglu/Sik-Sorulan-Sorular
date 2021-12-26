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

// master grid
$grid = new jqgrid($db_conf);

$opt["caption"] = "Clients Data";
$opt["add_options"]["modal"] = false;
$opt["edit_options"]["modal"] = false;
$opt["autowidth"] = true;

$opt["edit_options"]["afterShowForm"] = 'function (form) {
  var fldSrc = "";
  var fldDest= "";
  var wData  = "";

  var $btn = $(\'<a href="#"><span class="ui-icon ui-icon-extlink"></span></a>\')
      .addClass("fm-button ui-state-default")
      .css({"padding": "4px", "vertical-align": "bottom"})
      .click(function() {

			// set source / dest field names
			if (this.id == "btnCompany") {
			  fldSrc = "name";
			  fldDest= "company";
			}
			
			jQuery(document).unbind("keypress").unbind("keydown").unbind("mousedown");
			
			jQuery.fancybox.open({href: "#lookup_grid",
				  afterClose : function() {
					  
					  // read selected value from list2 grid
					  var selr = jQuery("#list2").jqGrid("getGridParam","selrow");
					  if (selr != null) {
						  idRow = selr;
						  wData = jQuery("#list2").jqGrid("getCell", idRow, fldSrc);
						  
						  // and set in edit form field of list1
						  jQuery("input[name="+fldDest+"].FormElement").val(wData);
					  }
				  }
			  });
	  });

  var $btn1 = $btn.clone(true);
  $($btn1).attr("id", "btnCompany");
  $("#tr_company>td.DataTD").append(" ").append($btn1);
  
}';

$opt["add_options"]["afterShowForm"] = $opt["edit_options"]["afterShowForm"];

$grid->set_options($opt);
$grid->table = "clients";

$col = array();
$col["title"] = "Id";
$col["name"] = "client_id"; 
$col["width"] = "20";
$col["editable"] = true;
$cols[] = $col;	

$col = array();
$col["title"] = "Name";
$col["name"] = "name"; 
$col["editable"] = true;
$col["width"] = "80";
$cols[] = $col;	

$col = array();
$col["title"] = "Gender";
$col["name"] = "gender"; 
$col["width"] = "30";
$col["editable"] = true;
$cols[] = $col;	

$col = array();
$col["title"] = "Company";
$col["name"] = "company"; 
$col["editable"] = true;
$cols[] = $col;	

$grid->set_columns($cols);

$grid->set_actions(array(	
						"add"=>true, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"rowactions"=>false, // show/hide row wise edit/del/save option
						"export"=>true, // show/hide export to excel option
						"autofilter" => true, // show/hide autofilter for search
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
					) 
				);

$out_master = $grid->render("list1");

// ---------------------------------------------------------------------------------
// detail grid
$grid = new jqgrid($db_conf);

$opt = array();
$opt["sortname"]    = 'id'; // by default sort grid by this field
$opt["sortorder"]   = "desc"; // ASC or DESC
$opt["caption"]     = "Stores"; // caption of grid

$opt["add_options"]["modal"] = false;
$opt["edit_options"]["modal"] = false;

$opt["onSelectRow"] = "function(){ jQuery.fancybox.close(); }";
$grid->set_options($opt);

$grid->set_actions(array(	
						"add"=>false, // allow/disallow add
						"edit"=>false, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"rowactions"=>false, // show/hide row wise edit/del/save option
						"autofilter" => true, // show/hide autofilter for search
						"search" => true // show single/multi field search condition (e.g. simple or advance)
					)
				);
				
$grid->table = "store";

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
	
	<!-- Add fancyBox main JS and CSS files -->
	<link type="text/css" rel="stylesheet" href="//cdn.jsdelivr.net/fancybox/2.1.4/jquery.fancybox.css" />
	<script type="text/javascript" src="//cdn.jsdelivr.net/fancybox/2.1.4/jquery.fancybox.js"></script>
	
</head>
<body>
	<style>
	/* required for add/edit dialog overlapping */
	.fancybox-overlay { z-index:943 !important; }
	#editmodlist1.ui-jqdialog { z-index: 942 !important; }
	</style>

	<div style="margin:10px">
	<?php echo $out_master ?>
	</div>

	<div id='lookup_grid' style='display:none; width:70%'>
	<?php echo $out_detail?>
	</div>

</body>
</html>
