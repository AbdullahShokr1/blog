<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'keywords',
        'content',
        'schema',
        'telephone',
        'slug',
        'photo',
    ];
    protected $casts = [
        'schema' => 'array'
    ];
    public function setSchemaAttribute($value)
    {
        $schema = [];

        foreach ($value as $array_item) {
            if (!is_null($array_item['key'])) {
                $schema[] = $array_item;
            }
        }

        $this->attributes['schema'] = json_encode($schema);
    }

    public function scopeSearch($query, $req)
    {
        $query->where(function ($query) use ($req) {
            $query->where('title', 'LIKE', '%' . $req . '%');
        });
    }
}
