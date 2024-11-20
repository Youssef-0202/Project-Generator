<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    protected $fillable = [
        'projectId',
        'componentId',
        'imagePath'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'projectId');
    }

    public function composant()
    {
        return $this->belongsTo(Composant::class, 'componentId');
    }
}
