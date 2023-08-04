<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pronouns extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = ["id","text","audio"];
    public function interactions ():HasMany{
        return $this->hasMany(Interactions::class);
    }
}
