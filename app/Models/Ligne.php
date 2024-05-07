<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligne extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'atelier_id',
    ];
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($ligne) {
            $latestId = \DB::table('lignes')->max('id'); 
            $nextId = $latestId + 1; 
            $ligne->code = 'LI-' . sprintf('%03d', $nextId); 
        });
    }
    
    public function atelier()
    {
        return $this->belongsTo(Atelier::class);
    }

    public function cadences()
    {
        return $this->hasMany(Cadence::class);
    }
}