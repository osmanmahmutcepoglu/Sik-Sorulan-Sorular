<?php
include("../App/Vendor/php-grid/lib/inc/jqgrid_dist.php");
include("../App/Vendor/idiorm.php");
include("../App/Vendor/smarty-master/libs/Smarty.class.php");

$smarty = new Smarty();
$smarty->setTemplateDir('View/Views');

ORM::configure('mysql:host=localhost;dbname=sss');
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
ORM::configure('username', 'root');
ORM::configure('password', '');
date_default_timezone_set('Europe/Istanbul');


//GRİD SETTİNGS
define("PHPGRID_DBTYPE", "mysqli");
define("PHPGRID_DBHOST", "localhost");
define("PHPGRID_DBUSER", "root");
define("PHPGRID_DBPASS", "");
define("PHPGRID_DBNAME", "sss");
define("PHPGRID_LIBPATH", dirname(__FILE__) . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR);

$db_conf = array();
$db_conf["type"] = "mysqli";
$db_conf["server"] = PHPGRID_DBHOST; // or you mysql ip
$db_conf["user"] = PHPGRID_DBUSER; // username
$db_conf["password"] = PHPGRID_DBPASS; // password
$db_conf["database"] = PHPGRID_DBNAME; // database

$g = new jqgrid($db_conf);
$g->navgrid["param"]["del"] = false;
$g->navgrid["param"]["view"] = false;
$g->navgrid["param"]["edit"] = false;
$g->navgrid["param"]["add"] = false;
$g->navgrid["param"]["search"] = true;
$g->navgrid["param"]["refresh"] = true;
$g->navgrid["param"]["globalsearch"] = true;
$g->set_actions(array(
        "add" => false, // allow/disallow add
        "edit" => false, // allow/disallow edit
        "delete" => false, // allow/disallow delete
        "rowactions" => false, // show/hide row wise edit/del/save option
        "export" => true, // show/hide export to excel option
        "autofilter" => true, // show/hide autofilter for search
        "search" => "advance", // show/hide autofilter for search
        "showhidecolumns" => true
    )
);
$opt["rowNum"] = 50;
$opt["caption"] = "";
$opt["cellEdit"] = false;
$opt["scrool"] = true;
$opt["responsive"] = true;
$opt["forceFit"] = true;
//$opt["autowidth"] = true;
$opt["autoresize"] = true;
$opt["shrinkToFit"] = true;
$opt["altRows"] = true;
$opt["export"] = array("format" => "pdf", "filename" => "liste", "sheetname" => "test");
$opt["export"] = array("filename" => "liste", "heading" => "Liste", "orientation" => "landscape", "paper" => "a4");
$opt["export"]["range"] = "filtered";
$opt["hotkeys"] = true;
$opt["loadtext"] = "Yükleniyor...";
$opt["sortorder"] = "desc";
$opt["tooltip"] = true;
$opt["toolbar"] = "bottom";
$opt["globalsearch"] = true;
//$opt["cmTemplate"] = array("width"=>"400");
//$opt["scroll"] = true;
//$opt["footerrow"] = true;
//$opt["loadComplete"] = "function(){ $('#list1').jqGrid('setGridHeight',$(window).width()-300); }";
$opt["loadComplete"] = "function(){ $('#list1').jqGrid('setGridHeight',$(window).height()-300); }";

//GRİD SETTİNGS END


function _auth()
{
    global $smarty;
    if (isset($_SESSION['verify_id'])) {
        $smarty->assign('oturum', 'acik');
        return true;
    } else {
        $smarty->assign('oturum', 'kapali');
        return false;
    }
}

_auth();
