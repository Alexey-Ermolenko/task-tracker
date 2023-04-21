<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    use HasFactory;

    /**
     * Таблица БД, ассоциированная с моделью.
     *
     * @var string
     */
    protected $table = 'companies';

    protected $fillable = [
        'name',
        'image',
        'description',
        'created_by',
        'is_active',
    ];

    /**
     * Get Company based Users
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'company_users', 'company_id', 'user_id')->withPivot('id')->withTimestamps();
    }

    /**
     * @return HasMany
     */
    public function projects(): HasMany
    {
        return $this->hasMany('App\Models\Project', 'company_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany('App\Models\ProjectTask', 'company_id', 'id')->orderBy('id', 'desc');
    }

    public function creator(): HasOne
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
}
