<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourDescription extends Model
{
    protected $table = 'tour_descriptions';
    protected $fillable = ['tour_id', 'text'];

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }
}
