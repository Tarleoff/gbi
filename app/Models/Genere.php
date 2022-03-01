<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genere extends Model
{
    use HasFactory;
    protected $table = 'generes';


   /* public function video() {
        return $this->hasManyThrough(
            VideosGenere::class, 
            Video::class,
            'idVideoVG', // Local key on the projects table...
            'id' // Local key on the environments table...
    );
    }*/
}
