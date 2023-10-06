<?php

namespace controllers;

use classes\Controller;

class Api extends Controller
{
    public function index()
    {
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
