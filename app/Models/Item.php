<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'Item';

     /*public function mark(){

        $this->done = $this->done ? false : true;
        $this ->save();
     }*/
}
