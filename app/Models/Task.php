<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function lastActivitiesCompleted()
    {
        return $this->hasOne(Activity::class, 'id', 'last_activity_completed_id');
    }

    public function scopeOrderByName($query)
    {
        $query->orderBy('name')->orderBy('description');
    }

    public function scopeWithLastActivityCompleted($query)
    {
        $subQuery = \DB::table('activities')
            ->select('name')
            ->whereRaw('task_id = tasks.id')
            ->where('completed', true)
            ->latest()
            ->limit(1);

        return $query->select('tasks.*')->selectSub($subQuery, 'last_activity_completed');

    }

    public function scopeWithLastActivitiesCompleted($query)
    {
        $query->addSubSelect('last_activity_completed_id', Activity::select('id')
            ->whereRaw('task_id = tasks.id')
            ->latest()
        )->with('lastActivitiesCompleted');
    }

}
