<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $primaryKey = 'templateId';

    protected $fillable = ['name', 'description', 'html_content', 'status'];

    public function components()
    {
        return $this->hasMany(Composant::class, 'templateID');
    }
}