<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $primaryKey = "id";
    protected $fillable = ['customer_name','customer_email','customer_mobile','requestId','processURL','status'];
}
