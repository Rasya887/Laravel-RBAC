<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Menu extends Model
{
    use HasApiTokens;

    protected $fillable = ['name', 'url'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
