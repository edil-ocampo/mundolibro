<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    

    protected $table = 'tbl_books';
    protected $fillable = ['name', 'author', 'publication_year','genre','price','synopsis','image','url'];
    protected $primaryKey = 'id'; 
    public $timestamps = false;

    public function downloads()
    {
        return $this->hasMany(Download::class);
    }

}
