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
     * Get users who followers task
     *
     * @return mixed
     */
    public function users(): mixed
    {
        return User::whereIn('id', json_decode($this->followers))->get();
    }

    /**
     * Get users who likes task
     * @return mixed
     */
    public function likes_users(): mixed
    {
        $likes_users = null;

        if ($this->likes) {
             $likes_users = User::whereIn('id', json_decode($this->likes))->get();
        }

        return $likes_users;
    }

    public function assign(): HasOne
    {
        return $this->hasOne('App\Models\User', 'id', 'assign_to');
    }

    /**
     * @return HasOne
     */
    public function creator(): HasOne
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    /**
     * Get task based comments
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany('App\Models\ProjectTaskComment', 'task_id', 'id')->orderBy('id', 'DESC');
    }

    /**
     * Get task based it's file
     *
     * @return HasMany
     */
    public function taskFiles(): HasMany
    {
        return $this->hasMany('App\Models\ProjectTaskFile', 'task_id', 'id')->orderBy('id', 'DESC');
    }

    /**
     * Get task based activity log
     *
     * @return mixed
     */
/*    public function activity_log(): mixed
    {
        return ActivityLog::where('user_id', '=', Auth::user()->id)
            ->where('project_id', '=', $this->project_id)
            ->where('task_id', '=', $this->id)
            ->get();
    }*/

    // get Project based activities
    public function activity_log(): HasMany
    {
        return $this->hasMany('App\Models\ActivityLog', 'task_id', 'id')->orderBy('id', 'desc');
    }

    /**
     * Get task stage
     *
     * @return HasOne
     */
    public function stage(): HasOne
    {
        return $this->hasOne('App\Models\ProjectTaskStages', 'id', 'stage_id');
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
