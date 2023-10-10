<?php

namespace controllers;

use classes\Controller;

class Site extends Controller
{
    public function index()
    {
        $this->render('index');
    }
}
