<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meal extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $fillable = ['title','price','description','photo','type_id'];
    protected $hidden = ['created_at','updated_at'];
    /*protected $casts = [
        'type_id' =>mealType::class,
    ];*/

    public function path($append = ''){
        $path = route('meal',$this->id);

        return $append ? '{$path} / {$append}' : $path;
    }

    public function getPhotoAttribute($value){
        return asset($value);
    }

}
