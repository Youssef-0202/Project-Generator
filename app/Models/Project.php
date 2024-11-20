<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    
    protected $primaryKey = 'projectID';
    protected $fillable = ['userId', 'titre', 'description', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
