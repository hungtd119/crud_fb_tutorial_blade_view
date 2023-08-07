<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id','image','sentence','audio','page_number','story_id'];
    public function stories ():BelongsTo{
        return $this -> belongsTo(Story::class,'story_id');
    }
    public function pronouns ():BelongsToMany{
        return $this->belongsToMany(Pronoun::class,'pronoun_page');
    }
    public function words ():HasMany{
        return $this->hasMany(Word::class);
    }
    public function interactions ():HasMany{
        return $this -> hasMany(Interaction::class);
    }
}
