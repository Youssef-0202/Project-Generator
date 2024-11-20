<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Previsualisation extends Model
{
    protected $fillable = [
        'projectId',
        'contenu',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'projectId');
    }
}
