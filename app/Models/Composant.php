<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Composant extends Model
{
    protected $primaryKey = 'componentId'; // Use `componentId` as the primary key
    public $incrementing = true;          // True since it's an auto-incrementing key
    protected $keyType = 'int';           // Define the key type as integer
  
    protected $fillable = ['templateId', 'name',  'contenu'];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
