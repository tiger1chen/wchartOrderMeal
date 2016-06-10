<?php
	require_once('../include/init.php');
	$cate = new CateModel();
	$categ = $cate->FCate();
	$al   = $cate->ACate();//获得wx_menu所有的元素

	$all  = $cate->getCatTree($al);
	require_once('../view/admin/templates/category.html');