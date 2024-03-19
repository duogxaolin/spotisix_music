<?php
require __DIR__ . '/vendor/autoload.php';

$connect = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'spotisix'
);

require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/helper.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/libs.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/is_username.php');
/*
function CheckLogin()
{
    
    if(empty($_SESSION['login']))
    {
        return die($_SERVER['DOCUMENT_ROOT'].'/<script type="text/javascript">setTimeout(function(){ location.href = "/login" }, 0);</script>');
    }
}
function CheckNoLogin()
{
    if(isset($_SESSION['login']))
    {
        return die($_SERVER['DOCUMENT_ROOT'].'/<script type="text/javascript">setTimeout(function(){ location.href = "/" }, 0);</script>');
    }
}
*/
?>