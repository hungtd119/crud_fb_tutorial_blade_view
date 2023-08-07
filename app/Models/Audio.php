<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Audio extends Model
{
    use HasFactory;
    protected $table = "audios";
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id','filename','path'];
    public function pronouns ():HasMany{
        return $this->hasMany(Pronoun::class);
    }
}
