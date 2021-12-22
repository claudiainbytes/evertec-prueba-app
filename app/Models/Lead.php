<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $guard = 'lead';
    protected $table = "leads";
    protected $primaryKey = "id";
    protected $fillable = [
        'firstname', 'lastname','email', 'companyname','website','phone','suscribe','get_resource'
    ];

}