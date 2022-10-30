<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    const ADMIN = 1;
    const USER = 2;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code',
        'name',
    ];


    /**
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany('App\Models\User', 'role_id', 'code');
    }
}
