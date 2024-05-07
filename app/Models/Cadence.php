<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article; 
use App\Models\atelier; 
use App\Models\Ligne; 

class Cadence extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'cadence',
        'unité',
        'atelier_id',
       'ligne_id',
       'article_id',
       
    ];
    protected static function boot()
{
    parent::boot();

    static::creating(function ($cadence) {
        $latestId = static::max('id'); 
        $nextId = $latestId + 1; 
        $cadence->code = 'CA-' . sprintf('%03d', $nextId); 
    });
}

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id'); 
    }

    public function atelier()
    {
        return $this->belongsTo(Atelier::class, 'atelier_id');
    }
    

    public function ligne()
    {
        return $this->belongsTo(Ligne::class,'ligne_id');
    }
}
