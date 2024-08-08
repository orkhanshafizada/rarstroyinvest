<?php


namespace App\Models;

use Spatie\Permission\Models\Role as SpRole;

class Role extends SpRole
{
    /**
     * @var string
     */
    public $guard_name = 'admin';
}
