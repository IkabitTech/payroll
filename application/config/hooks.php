<?php

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/


$hook['pre_controller'][] = array(
                                 'class'=>'Urlhooks',
                                'function' => 'ssl_redirect',
                                'filename' => 'sslfile.php',
                                'filepath' => 'hooks',
                                'params' => array()
                           
                                
);
