<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'intelligence',
        'strength',
        'speed',
        'durability',
        'power',
        'combat',
        'height',
        'weight',
        'image_sm_url',
        'image_lg_url',
        'alignment_id',
        'aliases',
        'user_created'
    ];
    public $timestamps = false;

    public function alignment()
    {
        return $this->hasOne(Alignment::class, 'id', 'alignment_id');
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }
}
