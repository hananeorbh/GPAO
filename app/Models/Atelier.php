<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Atelier extends Model
{    
    protected $fillable = [
        'code',
        'name', 

        
    ];
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($atelier) {
            $latestId = \DB::table('ateliers')->max('id'); 
            $nextId = $latestId + 1; 
            $atelier->code = 'AT-' . sprintf('%03d', $nextId); 
        });
    }
    
    public function lignes()
    {
        return $this->hasMany(Ligne::class);
    }

    public function plannings()
    {
        return $this->hasMany(Planning::class);
    }
    public function productions()
    {
        return $this->hasMany(Production::class, 'atelier');
    }
}