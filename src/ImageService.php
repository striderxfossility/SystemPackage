<?php
namespace Jelle\Strider;

class ImageService {
    public static function get($url)
    {   
        if (str_contains($url, 'pdf')) {
            $path_array = explode('.', $url)[0];
            $paths = explode('/', $path_array);

            $string_builder = '';

            for ($i=0; $i < count($paths) - 1; $i++) { 
                $string_builder .= $paths[$i] . '/';
            }

            $string_builder .= 'pdf_image/' . $paths[count($paths) - 1] . '.png';
        }

        return $url;
    }
}