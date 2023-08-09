<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Page extends Model
{
    use HasFactory;
    protected $table = 'pages';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id','image_id','page_number','story_id'];
    public function stories ():BelongsTo{
        return $this -> belongsTo(Story::class,'story_id');
    }
    public function interactions ():HasMany{
        return $this -> hasMany(Interaction::class);
    }
    public function image ():BelongsTo{
        return $this -> belongsTo(Image::class);
    }
    public function texts ():BelongsToMany{
        return $this->belongsToMany(Text::class,'text_config');
    }
}
