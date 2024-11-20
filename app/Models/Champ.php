<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Champ extends Model
{
    protected $fillable = [
        'typeChamp',
        'etiquette',
        'obligatoire',
        'defaultVal',
        'componentId'
    ];

    public function composant()
    {
        return $this->belongsTo(Composant::class, 'componentId');
    }
}
