<?php

return array(

    'prefix'                => 'proxy',
    
    'debug_on'              => false,
    'debug_level'           => 3,
    'file_cache_enabled'    => true,
    'file_cache_directory'  => base_path() . '/storage/cache/timthumb',
    'not_found_image'       => 'http://domain.example/vendor/timthumb/images/nophoto.gif',
    'error_image'           => 'http://domain.example/vendor/timthumb/images/nophoto.gif',
    'png_is_transparent'    => true

);