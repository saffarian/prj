<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tours';
    protected $fillable = ['type', 'number', 'time', 'expires_at', 'text', 'title', 'price', 'text'];
    protected $appends = ['expired'];

    protected $dates = ['expires_at'];

    public function descriptions()
    {
        return $this->hasMany(TourDescription::class, 'tour_id');
    }

    public function getExpiredAttribute()
    {
        return Carbon::now() >= $this->expires_at;
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class, 'tour_id');
    }

    public function getAvailableAttribute()
    {
        return $this->number - $this->reserves()->count() > 0;
    }

    public function getUrlAttribute()
    {
        return route('tour_single', ['id' => $this->id]);
    }
}
