<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
      public $table='admin';
      public $primaryKey='id';
      public $incrementing=true;
      public $keyType='int';
      public $timestamps=false;
}
