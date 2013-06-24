<?php
session_start( );
require_once '../civicrm.config.php';
require_once 'CRM/Core/Config.php';
require_once 'CRM/Utils/Request.php';

$config = CRM_Core_Config::singleton();
$ext = CRM_Extension_System::singleton()->getMapper();
$path = $ext->keyToBasePath ("org.civicrm.payment.ogone");
require_once ($path."/OgoneIPN.php");
static $store = null;
$qfKey = CRM_Utils_Request::retrieve('qfKey', 'String', $store, false, null, 'GET');
CRM_Core_Payment_OgoneIPN::main($qfKey);
