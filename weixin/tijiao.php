<?php
include('./include/init.php');
$wid = $_GET['wid'];
$cart = CartModel::getCart();
$data = $cart->all();
include(ROOT.'view/front/templates/tijiao.html');