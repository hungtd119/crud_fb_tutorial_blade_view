<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Interaction extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id','bg','image','page_id'];
    public function pages ():BelongsTo{
        return $this->belongsTo(Page::class,'page_id');
    }
    public function positions ():HasMany{
        return $this -> hasMany(Position::class);
    }
    public function pronouns ():BelongsToMany{
        return $this->belongsToMany(Pronoun::class,'pronoun_interaction');
    }
}
