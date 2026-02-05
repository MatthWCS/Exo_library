<?php

function pathToRoute(string $routeName, array $params = [] ) : string
{
    $path = "index.php?route=" . $routeName;

    foreach ( $params as $param => $value )
    {
        $path .= "&" . $param . '=' . $value;
    }

    return $path;
}