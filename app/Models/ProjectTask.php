<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class ProjectTask extends Model
{
    use HasFactory;

    public static array $priority = [
        'critical' => 'Critical',
        'high' => 'High',
        'medium' => 'Medium',
        'low' => 'Low',
    ];

    public static array $priority_color = [
        'critical' => 'danger',
        'high' => 'warning',
        'medium' => 'primary',
        'low' => 'info',
    ];

    /**
     * @return mixed
     */
    public function users(): mixed
    {
        return User::whereIn('id', explode(',', $this->assign_to))->get();
    }

    /**
     * Get task based comments
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany('App\Models\TaskComment', 'task_id', 'id')->orderBy('id', 'DESC');
    }

    /**
     * Get task based it's file
     *
     * @return HasMany
     */
    public function taskFiles(): HasMany
    {
        return $this->hasMany('App\Models\TaskFile', 'task_id', 'id')->orderBy('id', 'DESC');
    }

    /**
     * Get task based activity log
     *
     * @return mixed
     */
    public function activity_log(): mixed
    {
        return ActivityLog::where('user_id', '=', Auth::user()->id)->where('project_id', '=', $this->project_id)->where('task_id', '=', $this->id)->get();
    }

    /**
     * Get task stage
     *
     * @return HasOne
     */
    public function stage(): HasOne
    {
        return $this->hasOne('App\Models\TaskStage', 'id', 'stage_id');
    }

    /**
     * Get task project
     *
     * @return HasOne
     */
    public function project(): HasOne
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }

    /**
     * Get task company
     *
     * @return HasOne
     */
    public function company(): HasOne
    {
        return $this->hasOne('App\Models\Company', 'id', 'company_id');
    }
}
