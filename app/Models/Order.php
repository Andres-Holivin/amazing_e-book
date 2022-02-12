<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    public $timestamps = false;
    public function book(){
        return $this->hasOne(EBook::class,"ebook_id","ebook_id");
    }

    public function account(){
        return $this->hasOne(Account::class,"account_id","id");
    }
}
