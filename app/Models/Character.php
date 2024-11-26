<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function movieSeries()
{
    return $this->belongsTo(MovieSeries::class);
}

}
