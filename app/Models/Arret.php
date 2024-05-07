<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arret extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'masqué',
        'duration',
        'famille',
        'sfamille',
        'class',
        'impact',
        'production_id',
        'catalog_id',
    ];
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($arret) {
            $latestId = \DB::table('arrets')->max('id'); 
            $nextId = $latestId + 1; 
            $arret->code = 'Arr-' . sprintf('%03d', $nextId); 
        });
    }

    public function production()
    {
        return $this->belongsTo(Production::class);
    }

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
}