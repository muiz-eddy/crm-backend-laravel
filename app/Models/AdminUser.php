<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $fillable = ['asp_id', 'id', 'fullname','email', 'password', 'roleid','username', 'status', 'permission'];

}
