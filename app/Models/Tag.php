<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // protected $fillable = ['name']; //AppServiceProvider::boot() -> Model::unguard() acheives the same thing but project-wide

    use HasFactory;

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }
}
