<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProjectTaskStages extends Model
{
    use HasFactory;

    protected $table = 'project_task_stages';

    protected $fillable = [
        'project_id',
        'name',
        'is_complete',
        'created_by',
    ];

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    /**
     * @return HasOne
     */
    public function project(): HasOne
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }
}
