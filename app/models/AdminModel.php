<?php

namespace app\models;

use flight\Engine;

class AdminModel
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}
