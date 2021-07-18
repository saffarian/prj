<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $table = 'reserves';
    protected $fillable = ['tour_id', 'user_id', 'number', 'first_name', 'last_name', 'adult_number', 'child_number', 'birth_date'];

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
