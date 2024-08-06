<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidd extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'tender_id',
        'name',
        'companyname',
        'email',
        'phone',
        'address',
        'bid_amount',
        'quotation',


    ];
}
