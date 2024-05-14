<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitLinkWithTime extends Model
{
    use HasFactory;
    protected $fillable=['url','redirect_url'];
}
