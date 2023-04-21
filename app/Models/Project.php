<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    const ON_HOLD = 'On Hold';
    const IN_PROGRESS = 'In Progress';
    const COMPLETE = 'Complete';
    const CANCELED = 'Canceled';

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
        self::ON_HOLD,
        self::IN_PROGRESS,
        self::COMPLETE,
        self::CANCELED
    ];

    public static $status_color = [
        self::ON_HOLD => 'warning',
        self::IN_PROGRESS => 'info',
        self::COMPLETE => 'success',
        self::CANCELED => 'danger',
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
    public function company(): HasOne
    {
        return $this->hasOne('App\Models\Company', 'id', 'company_id');
    }

    // Get Project based it's Tasks

    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany('App\Models\ProjectTask', 'project_id', 'id')->orderBy('id', 'desc');
    }
}
