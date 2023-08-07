<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pronounpage extends Model
{
    use HasFactory;
    protected $table = 'pronoun_page';
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = ["id","pronoun_id","page_id"];
}
