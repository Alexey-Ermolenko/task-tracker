<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    /**
     * Таблица БД, ассоциированная с моделью.
     *
     * @var string
     */
    protected $table = 'projects';

    protected $fillable = [
        'name',
        'image',
        'status',
        'description',
        'created_by',
        'is_active',
    ];

    public static $status = [
        'on_hold' => 'On Hold',
        'in_progress' => 'In Progress',
        'complete' => 'Complete',
        'canceled' => 'Canceled',
    ];

    public static $status_color = [
        'on_hold' => 'warning',
        'in_progress' => 'info',
        'complete' => 'success',
        'canceled' => 'danger',
    ];

    /**
     * Get Project based Users
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'users_projects', 'project_id', 'user_id')->withPivot('id')->withTimestamps();
    }

    /**
     * Get Company that assigned in project
     * @return HasOne
     */
    public function role(): HasOne
    {
        return $this->hasOne('App\Models\Company', 'id', 'company_id');
    }
}
