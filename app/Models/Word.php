<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Word extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id','wordIndex','startTime','endTime','page_id'];
    public function pages () : BelongsTo{
        return $this->belongsTo(Page::class,'page_id');
    }
}
