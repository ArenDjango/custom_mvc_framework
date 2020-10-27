<?php

namespace vendor\framework\Controller;

abstract class Controller{

    public function render($template, $params=[])
    {
        foreach ($params as $key => $value) {
            ${$key} = $value;
        }
        if(file_exists(ROOT . "/resources/templates/$template.php")) {
            include ROOT . "/resources/templates/$template.php";
        }
    }
}