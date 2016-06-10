<?php
require('../include/init.php');
$db = new LoginModel();
if(isset($_POST['strName'])&& isset($_POST['strPassword'])&& isset($_POST['check'])){
 $db->get_user_login($_POST['strName'],$_POST['strPassword'],$_POST['check']);
}
include(ROOT.'view/admin/templates/login.html');
