<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_pf_id',
        'article_ip_id',
        'quantite',
        'unite',
    ];

    public function article_pf()
{
    return $this->belongsTo(Article::class, 'article_pf_id');
}

public function article_ip()
{
    return $this->belongsTo(Article::class, 'article_ip_id');
}

   
    

}