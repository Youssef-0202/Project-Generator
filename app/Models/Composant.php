<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Composant extends Model
{
  
    protected $fillable = ['template_id', 'name', 'type', 'content', 'status'];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
