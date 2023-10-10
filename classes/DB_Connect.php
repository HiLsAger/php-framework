<?php

use classes\Application;
use Illuminate\Database\Capsule\Manager as Capsule;

class DBConnect
{
    public function connect(): Capsule
    {
        $capsule = new Capsule();

        $db =

            $capsule->addConnection([]);

        return $capsule;
    }
}
