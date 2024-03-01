<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Technology;

class Project extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'name',
        'type_id',
        'description',
        'repository_link',
        'date_start',
        'date_end',
        'img',
        'slug'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
