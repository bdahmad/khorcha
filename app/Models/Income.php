<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $primaryKey = 'income_id';

    public function categoryInfo(){
        return $this->belongsTo('App\Models\IncomeCategory','income_cate_id','income_cate_id');
    }
    
    public function creatorInfo(){
        return $this->belongsTo('App\Models\User','income_creator','id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\User','income_editor','id');
    }
}
