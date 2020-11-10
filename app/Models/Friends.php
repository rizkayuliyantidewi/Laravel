<?php

namespace App\Models;
use App\Http\Controller\cobaController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{


    use HasFactory;
    protected $guarded = ['nama'];

    public function groups()
    {
        return $this->belongsTo('App\Models\Groups');
    }
}
    











