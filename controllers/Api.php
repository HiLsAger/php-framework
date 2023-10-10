<?php

namespace controllers;

use classes\Controller;
use languages\ExceptionsRu;

class Api extends Controller
{
    public function index()
    {
        // print_r(ExceptionsRu::getProperty('unknown_property')); //unknown_property
        $this->render('index', [
            'text' => 'Hello world'
        ]);
    }

    public function GetResponse()
    {
        $this->render('payment-order', [
            'text' => 'Hello world'
        ]);
    }
}
