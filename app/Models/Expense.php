<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $primaryKey = 'expense_id';

    public function creatorInfo(){
        return $this->belongsTo('App\Models\User','expense_creator', 'id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\User','expense_editor', 'id');
    }
    public function categoryInfo(){
        return $this->belongsTo('App\Models\ExpenseCategory','expense_cate_id','expense_cate_id');
    }
}
