<?php

# ensure sending 401 on errors
function errorHandler($errno, $errstr, $errfile, $errline) {
  http_response_code(401);
  exit();
}
set_error_handler("errorHandler");

require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/vars.inc.php';
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/vars.local.inc.php')) {
  include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/vars.local.inc.php';
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/functions.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/sessions.inc.php';


if ($_SESSION['mailcow_cc_role'] == "admin") {
  http_response_code(200);
} else {
  http_response_code(401);
}

exit();
?>