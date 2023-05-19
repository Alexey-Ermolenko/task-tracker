<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ActivityLog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activity_logs';

    protected $fillable = [
        'user_id',
        'company_id',
        'project_id',
        'task_id',
        'log_type',
        'remark',
    ];

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    /**
     * @return HasMany
     */
    public function project(): HasMany
    {
        return $this->hasMany('App\Models\Project', 'id', 'project_id');
    }

    /**
     * @return HasMany
     */
    public function company(): HasMany
    {
        return $this->hasMany('App\Models\Company', 'id', 'company_id');
    }

    /**
     * @return string
     */
    public function getRemark(): string
    {
        $remark = json_decode($this->remark, true);

        if ($remark)
        {
            $user_name = $this->user ? $this->user->name : '';

            if($this->log_type == 'Invite User')
            {
                return $user_name . ' ' . __('has invited') . ' <b>' . $remark['title'] . '</b>';
            }
            elseif($this->log_type == 'User Assigned to the Task')
            {
                return $user_name . ' ' . __('has assigned task ') . ' <b>' . $remark['task_name'] . '</b> ' . __(' to') . ' <b>' . $remark['member_name'] . '</b>';
            }
            elseif($this->log_type == 'User Removed from the Task')
            {
                return $user_name . ' ' . __('has removed ') . ' <b>' . $remark['member_name'] . '</b>' . __(' from task') . ' <b>' . $remark['task_name'] . '</b>';
            }
            elseif($this->log_type == 'Upload File')
            {
                return $user_name . ' ' . __('Upload new file') . ' <b>' . $remark['file_name'] . '</b>';
            }
            elseif($this->log_type == 'Create Task')
            {
                return $user_name . ' ' . __('Create new Task') . " <b>" . $remark['title'] . "</b>";
            }
            elseif($this->log_type == 'Move Task')
            {
                return $user_name . ' ' . __('Moved the Task') . " <b>" . $remark['title'] . "</b> " . __('from') . " " . __(ucwords($remark['old_stage'])) . " " . __('to') . " " . __(ucwords($remark['new_stage']));
            }
            else
            {
                return $this->remark;
            }
        }
        else
        {
            return $this->remark;
        }
    }

    public function logIcon($type = ''): string
    {
        $icon = '';

        if(!empty($type))
        {
            if($type == 'Invite User')
            {
                $icon = 'fa-paper-plane';
            }
            else if($type == 'User Assigned to the Task')
            {
                $icon = 'fa-user-check';
            }
            else if($type == 'User Removed from the Task')
            {
                $icon = 'fa-user-times';
            }
            else if($type == 'Upload File')
            {
                $icon = 'fa-file-upload';
            }
            else if($type == 'Create Milestone')
            {
                $icon = 'fa-gem';
            }
            else if($type == 'Create Task')
            {
                $icon = 'fa-plus';
            }
            else if($type == 'Move Task')
            {
                $icon = 'fa-arrows-alt';
            }
            else if($type == 'Create Expense')
            {
                $icon = 'fa-plus';
            }
        }

        return $icon;
    }
}
