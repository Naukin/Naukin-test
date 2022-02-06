<?php
$uris=explode("/", $_SERVER['REQUEST_URI']);
$main_page=$uris[1];

if(isset($uris[2])){
    $second_page=$uris[2];
}

if($main_page)
{
    $available_pages=["main","blog", "news", "portfolio", "services", "current-service", "current-article"];
    if(in_array($main_page, $available_pages))
        $current_page = $main_page;
    else
    {
        header('HTTP/1.0 404 Not Found');
        exit();
    }
}
else
    $current_page = "main";


switch ($current_page) {
    case "main":
        $DESCRIPTION = "dsdhasjsdasd";
        $KEYWORDS = 'NVG, Naukin, Naukin Design, Design';
        $SITE_TITLE = 'Naukin Design';
        break;
    case "blog":
        $DESCRIPTION = "dsdhasjsdasd";
        $KEYWORDS = 'NVG, Naukin, Naukin Design, Design';
        $SITE_TITLE = 'Naukin Design';
        break;
    case "news":
        $DESCRIPTION = "dsdhasjsdasd";
        $KEYWORDS = 'NVG, Naukin, Naukin Design, Design';
        $SITE_TITLE = 'Naukin Design';
        break;
    case "portfolio":
        $DESCRIPTION = "dsdhasjsdasd";
        $KEYWORDS = 'NVG, Naukin, Naukin Design, Design';
        $SITE_TITLE = 'Naukin Design';
        break;
    case "services":
        $DESCRIPTION = "dsdhasjsdasd";
        $KEYWORDS = 'NVG, Naukin, Naukin Design, Design';
        $SITE_TITLE = 'Naukin Design';
        break;
    case "current-service":
        switch ($second_page) {
            case "landing":
                $DESCRIPTION = "dsdhasjsdasd";
                $KEYWORDS = 'NVG, Naukin, Naukin Design, Design';
                $SITE_TITLE = 'Naukin Design';
                break;
            default:
                $DESCRIPTION = "dsdhasjsdasd";
                $KEYWORDS = 'NVG, Naukin, Naukin Design, Design';
                $SITE_TITLE = 'Naukin Design';
                break;
        }

        break;
    case "current-article":
        $DESCRIPTION = "dsdhasjsdasd";
        $KEYWORDS = 'NVG, Naukin, Naukin Design, Design';
        $SITE_TITLE = 'Naukin Design';
        break;
}

?>