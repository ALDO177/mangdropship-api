<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Arr;
use Ramsey\Uuid\Rfc4122\UuidV4;

class TagsCategory extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $keyType = 'string';

    protected $fillable = [
        'tags_category_type',
        'tags_category_id',
        'code_access',
        'publish',
    ];

    protected $casts  = [ 'publish' => 'bool'];
    protected $hidden = ['id'];

    public function publish() : Attribute{
        return Attribute::make(function($values){
            return $values ? 'actived' : 'no_actived';
        });
    }

    protected static function boot() : void
    {
        parent::boot();
        static::creating(function(Model $model){
            $model->id = UuidV4::uuid4()->toString();
            $model->code_access = md5(time() . random_bytes(100));
        });
    }

    public function cateagable() : MorphTo{
        return $this->morphTo(__FUNCTION__, 'tags_category_type', 'tags_category_id');
    } 

    public function getGroupPublishAll(){
        return $this->with(['cateagable'])->chunkMap(function($groups){
            return $groups;
        })->groupBy('publish');
    }

    public function getActionPublish(string $publi){
        if(Arr::exists($this->getGroupPublishAll(), $publi)){
            return $this->getGroupPublishAll()[$publi];
        }
        return [];
    }
}
