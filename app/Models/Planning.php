<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'date',
        'équipe',
        'quart',
        'atelier_id'
    ];
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($planning) {
            $latestId = \DB::table('plannings')->max('id'); 
            $nextId = $latestId + 1; 
            $planning->code = 'PL-' . sprintf('%03d', $nextId); 
        });
    }
    public function ateliers()
    {
        return $this->belongsTo(Atelier::class);
    }
    
}