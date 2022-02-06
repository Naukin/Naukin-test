<?php
include_once __DIR__."/language.php";
if(in_array($lang, $langs))
    include_once __DIR__."/../configs/".$lang.".php";
else
	include_once __DIR__."/../configs/en.php";

include_once __DIR__."/../configs/consts.php";
include_once __DIR__."/router.php";

?>