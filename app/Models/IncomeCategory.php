<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'income_cate_id';

    
    public function creatorInfo(){
        return $this->belongsTo('App\Models\User','income_cate_creator','id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\User','income_cate_editor','id');
    }
}
