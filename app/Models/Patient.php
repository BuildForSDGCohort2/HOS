<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
    	'Ref',
    	'cardid',
    	'fullname',
    	'contact',
    	'gender',
    	'temperature',
    	'height',
    	'PWeight',
    	'Bp',
    	'Age',
    	'room',
    	'Reason',
    	'Prescibe',
    	'DoctorsName',
    	'bloodgrp',
    	'sicking',
    	'hbgenotype',
    	'Hivst','hypertS','Ucolor','Uappera','Ph','Uprote','Ugluc','UcliniT','UKet','Ubili',
    	'Ublod','Unitri','Urbc','Uwbc','Pharmacist','Btc','Utc','Dc','Grndtotal','Cashier','nursename','cash_id','phar_id','doc_id','nurse_id'

    ];

}
