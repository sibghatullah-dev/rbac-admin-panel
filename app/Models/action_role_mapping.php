<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class action_role_mapping extends Model
{
    protected $fillable = ['action_id','role_id'];

use HasFactory;
}
