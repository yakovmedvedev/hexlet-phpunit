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
        $list = str_getcsv($list, escape: '\\');
    }
    if ($pathParts['extension'] == 'json') {
        $list = json_decode($list);
    }
    if ($pathParts['extension'] == 'yaml') {
        $list = yaml_parse($list);
    }
    print_r($list);

    foreach ($list as $item) {
        $item = "<li>" . $item . "</li>\n";
        $newList[] = $item;
    }
    $newList = implode('', $newList);
    $htmlList = "<ul>\n" . $newList . "</ul>\n";
    print_r($htmlList);

    return $htmlList;
}
// makeList();
