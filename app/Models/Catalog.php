<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'famille',
        'sfamille',
        'class',
        'impact',
        
    ];
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($catalog) {
            $latestId = \DB::table('catalogs')->max('id'); 
            $nextId = $latestId + 1; 
            $catalog->code = 'CT-' . sprintf('%03d', $nextId); 
        });
    }

    public function stoppages()
    {
        return $this->hasMany(Stoppage::class);
    }
}