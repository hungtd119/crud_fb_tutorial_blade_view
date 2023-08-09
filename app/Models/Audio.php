<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Audio extends Model
{
    use HasFactory;
    protected $table = "audios";
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id','filename','path','time'];
    public function text ():HasOne{
        return $this->hasOne(Text::class,);
    }
}
