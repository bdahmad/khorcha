<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basic extends Model
{
    use HasFactory;
    protected $fillable = ['basic_id','basic_companyName','basic_title', 'basic_logo','basic_footerLogo','basic_favicon','basic_status'];
}
