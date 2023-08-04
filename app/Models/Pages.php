<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pages extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id','image','sentence','auido','page_number','story_id'];
    public function stories ():BelongsTo{
        return $this -> belongsTo(Stories::class);
    }
    public function words ():HasMany{
        return $this->hasMany(Words::class);
    }
    public function interactions ():HasMany{
        return $this -> hasMany(Interactions::class);
    }
}
