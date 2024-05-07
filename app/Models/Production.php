<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Article; 
use App\Models\atelier; 
use App\Models\Ligne; 
class Production extends Model
{
    use HasFactory;

    protected $fillable = [
       'date',
       'code',
       'quart',
       'équipe',
       'atelier_id',
       'ligne_id',
       'article_id',
       'type',
       'arret', 
       'unité',
       'quantité',
       'lot',
    ];



    protected static function boot()
{
    parent::boot();

    static::creating(function ($production) {
        // Récupérer la date actuelle au format AAMMJJ
        $date = date('dmy');

        $latestId = self::whereDate('created_at', now())->max('id');

        $production->code = 'PR-' . $date ;
    });
}




    public function consommations_ip()
    {
        return $this->hasMany(ConsommationIp::class);
    }

    public function arrets()
    {
        return $this->hasMany(Arret::class);
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

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
    public function recettes()
{
    return $this->hasMany(Recette::class);
}

}