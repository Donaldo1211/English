<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verb extends Model
{
    protected $table='verbs';

    public $fillable=[
      'verb',
      'past',
      'participle',
      'gerund',
      'meaning'
    ];
}
