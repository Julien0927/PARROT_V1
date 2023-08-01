<?php

function linesToArray(string $string){
    return explode(PHP_EOL, $string);
}

//fonction de renoomage de fichier upload
function slugify( $text, string $divider = '-') 
{
    //replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted charaacters
    $text = preg_replace('~[^-\w]+~', '', $text);

    //trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    //lowercase
    $text = strtolower($text);

    if(empty($text)) {
        return 'n-a';
    }

    return $text;

}