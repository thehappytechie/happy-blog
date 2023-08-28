<?php

namespace App\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model implements Auditable
{
    use HasFactory;
    use HasUlids;
    use \OwenIt\Auditing\Auditable;

    protected $guarded = ['id'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
