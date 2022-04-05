<?php

function getImageUrl($path)
{
    if(env('FAKER_DATA') == true){
        return $path;
    }
    return URL('storage/'.$path);
}