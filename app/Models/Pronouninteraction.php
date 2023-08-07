<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pronouninteraction extends Model
{
    use HasFactory;
    protected $table = 'pronoun_interaction';
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = ["id","pronoun_id","interaction_id"];
}
