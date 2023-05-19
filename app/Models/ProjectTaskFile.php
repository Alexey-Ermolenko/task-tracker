<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProjectTaskFile extends Model
{
    use HasFactory;

    /**
     * Таблица БД, ассоциированная с моделью.
     *
     * @var string
     */
    protected $table = 'project_task_files';

    /**
     * Get file creator
     *
     * @return HasOne
     */
    public function creator(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function task(): HasOne
    {
        return $this->hasOne(ProjectTask::class, 'id', 'task_id');
    }
}
