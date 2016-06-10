<?php
include('./include/init.php');
$cart = CartModel::getCart();
$data = $cart->all();
echo $data[2]['name'];