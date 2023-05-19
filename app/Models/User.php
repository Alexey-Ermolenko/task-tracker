<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'created_by',
        'phone',
        'gender',
        'is_active',
        'google',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return BelongsToMany
     */
    public function companies(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Company', 'company_users', 'user_id', 'company_id')->withPivot('id')->withTimestamps();
    }
    /**
     * @return BelongsToMany
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Project', 'users_projects', 'user_id', 'project_id')->withPivot('id')->withTimestamps();
    }

    /**
     * Get Role that assigned in user
     * @return HasOne
     */
    public function role(): HasOne
    {
        return $this->hasOne(Role::class, 'code', 'role_id');
    }

    // Get assigned tasks
    public function assigned_tasks(): HasOne
    {
        return $this->hasOne(ProjectTask::class, 'assign_to', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(ProjectTaskComment::class, 'created_by', 'id');
    }

    // Get followed tasks
    public function follower_tasks(): Collection
    {
        /**
         *  SELECT *
         *    FROM project_tasks
         *   WHERE exists(
         *              SELECT 1
         *                FROM jsonb_array_elements(followers) elem
         *               WHERE elem::int = 9
         *  );
         *
         * */
        return ProjectTask::whereRaw('exists(select 1 from jsonb_array_elements(followers) elem where elem::int = ' . $this->id . ')')->get();
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role->name === Role::ADMIN_NAME;
    }
}
