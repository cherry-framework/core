<?php

namespace Cherry\Controller;

class DefaultController
{
    use ControllerTrait;

    public function index()
    {
        $this->render('index');
    }
}