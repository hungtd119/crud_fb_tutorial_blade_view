<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Text extends Model
{
    use HasFactory;
    protected $table = 'texts';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id','text','icon','audio_id','wordSync'];
    public function audio ():BelongsTo{
        return $this->belongsTo(Audio::class,'audio_id');
    }
    public function interaction ():HasOne{
        return $this->hasOne(Interaction::class);
    }
    public function pages ():BelongsToMany{
        return $this->belongsToMany(Page::class,'text_config','text_id');
    }
    public  function position ():HasOne{
        return $this->hasOne(Position::class);
    }
}
