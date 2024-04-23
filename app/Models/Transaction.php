<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'tbl_transactions';
    protected $fillable = ['id_user', 'id_book', 'date','type_transaction','transaction_status','amount'];
    protected $primaryKey = 'id'; 
    public $timestamps = false;
}
