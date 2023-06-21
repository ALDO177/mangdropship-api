<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Str;

class Categorys extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_description',
        'category_slugh',
        'icon',
        'image_path',
        'active'
    ];

    protected $casts = [
        'active' => 'bool'
    ];

    protected static function boot(): void{
        parent::boot();
        static::creating(function(Model $model){
            $model->category_slugh = Str::slug($model->category_name);
        });
    }

    public function tagsCategorys(): MorphMany{
        return $this->morphMany(TagsCategory::class, 'cateagable', 'tags_category_type', 'tags_category_id');
    }

    public function tagsCategory(): MorphOne{
        return $this->morphOne(TagsCategory::class, 'cateagable', 'tags_category_type', 'tags_category_id');
    }
}
