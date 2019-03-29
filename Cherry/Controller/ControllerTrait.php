<?php

namespace Cherry\Controller;

use Cherry\Templating\Templater;

trait ControllerTrait
{
    private function render($template, $args = [])
    {
        $te = new Templater(TEMPLATES_PATH);

        $content = $te->render($template, $args);

        echo $content;

        return $content;
    }
}