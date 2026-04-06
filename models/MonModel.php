<?php

namespace models;

use models\base\SQL;
use utils\Template;

class MonModel extends SQL
{
    public function __construct()
    {
        parent::__construct('utilisateurs');
    }
	 function getUsers(): array
    {
        return $this->getAll();
    }
	
}