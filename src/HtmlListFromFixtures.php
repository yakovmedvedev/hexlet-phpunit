<?php

namespace HtmlListFromFixtures;

// $path = './files/list.yaml';

function makeList($path)
{
    $list = file_get_contents($path, true);
    $pathParts = pathinfo($path);
    // print_r($pathParts);
    // print_r($pathParts['extension']);

    if ($pathParts['extension'] == 'csv') {
        $list = str_getcsv($list);
    }
    if ($pathParts['extension'] == 'json') {
        $list = json_decode($list);
    }
    // if ($pathParts['extension'] == 'yaml') {
    //     $list = yaml_parse($list);
    // }
    print_r($list);

    foreach ($list as $item) {
        $item = "<li>" . $item . "</li>\n";
        $newList[] = $item;
    }
    return $newList;
    $htmlList = "<ul>\n" . implode('', $newList) . "</ul>\n";

    return $htmlList;
}
// makeList();
