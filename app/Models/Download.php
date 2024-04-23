<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $table = 'downloads';
    protected $fillable = ['user_id', 'book_id'];
    protected $primaryKey = 'id'; 
    public $timestamps = false;

     // Relación con el usuario que descargó el libro
     public function user()
     {
         return $this->belongsTo(User::class);
     }
 
     // Relación con el libro descargado
     public function book()
     {
         return $this->belongsTo(Book::class);
     }
}
