<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pronoun extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = ["id","text","audio"];
    public function interactions ():BelongsToMany{
        return $this->belongsToMany(Interaction::class,'pronoun_interaction');
    }
    public function pages (): BelongsToMany{
        return $this->belongsToMany(Page::class,'pronoun_page');
    }
    public function texts () : BelongsTo{
        return $this->belongsTo(Text::class,'text');
    }
    public function audios () : BelongsTo{
        return $this->belongsTo(Audio::class,'audio');
    }
}
