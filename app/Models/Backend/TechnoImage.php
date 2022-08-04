<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Encore\Admin\Traits\ModelTree;

class TechnoImage extends Model
{
    use HasFactory;

    public function techno(){
        return $this->hasOne(Techno::class, 'id', 'techno_id');
    }
}
