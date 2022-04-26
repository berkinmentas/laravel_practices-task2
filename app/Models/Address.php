<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'address',
        'district',
        'city',
        'postal_code',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
