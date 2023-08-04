<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Interactions extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id','bg','soundText','image','page_id'];
    public function pages ():BelongsTo{
        return $this->belongsTo(Pages::class);
    }
    public function pronouns ():BelongsTo{
        return $this->belongsTo(Pronouns::class);
    }
    public function positions ():HasMany{
        return $this -> hasMany(Positions::class);
    }
}
