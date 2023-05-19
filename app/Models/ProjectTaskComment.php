<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProjectTaskComment extends Model
{
    use HasFactory;

    protected $table = 'project_task_comments';

    protected $fillable = [
        'comment',
        'task_id',
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
    public function task(): HasOne
    {
        return $this->hasOne('App\Models\ProjectTask', 'id', 'task_id');
    }
}
