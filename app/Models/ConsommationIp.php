<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsommationIp extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'consommations_ip';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'article_id',
        'quantité',
        'unité',
        'production_id',
    ];
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($consommation_ip) {
            $latestId = \DB::table('consommations_ip')->max('id'); 
            $nextId = $latestId + 1; 
            $consommation_ip->code = 'Co-' . sprintf('%03d', $nextId); 
        });
    }

    /**
     * Get the production that owns the consumption.
     */
    public function production()
    {
        return $this->belongsTo(Production::class);
    }

    public function ipArticles()
    {
        return $this->hasMany(Article::class)->where('type', 'IP');
    }
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    
}