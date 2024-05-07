<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'type',
      
    ];

    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($article) {
            $latestId = \DB::table('articles')->max('id'); 
            $nextId = $latestId + 1; 
            $article->code = 'AR-' . sprintf('%03d', $nextId); 
        });
    }
  
    public function recettes()
    {
        return $this->hasMany(Recette::class);
    }
    
}