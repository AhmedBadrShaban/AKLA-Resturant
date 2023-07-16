<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $fillable = ['meal_id','user_id','comment','rate'];
    protected $hidden = ['created_at','updated_at'];

    

    public function getPhotoAttribute($value){
        return asset($value);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
