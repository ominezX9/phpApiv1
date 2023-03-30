<?php
// phpinfo();
    require __DIR__  . '/inc/bootstrap.php';

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode('/', $uri);
    $uriLen = count($uri);
    if(
        (isset($uri[($uriLen-2)]) && $uri[($uriLen-2)] != 'user') 
        || 
        !isset($uri[($uriLen-1)])
    )
        
    {
    //    print_r($uri);
        header("HTTP/1.1 404 Not Found");
        exit();
    }

    require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
    


    $objFeedController = new UserController();
    $strMethodName = $uri[($uriLen - 1)] . 'Action';
    $objFeedController->{$strMethodName}();