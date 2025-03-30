<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biographie extends Model {
    use HasFactory;
    protected $fillable = ['membre_id', 'texte'];

    public function membre() {
        return $this->belongsTo(Membre::class);
    }
}
