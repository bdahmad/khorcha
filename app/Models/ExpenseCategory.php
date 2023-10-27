<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'expense_cate_id';
    
    public function creatorInfo(){
        return $this->belongsTo('App\Models\User','expense_cate_creator','id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\User','expense_cate_editor','id');
    }
}
