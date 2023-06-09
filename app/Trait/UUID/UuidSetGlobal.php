<?php

namespace App\Trait\UUID;

use Exception;
use Ramsey\Uuid\Uuid as Generator;

trait UuidSetGlobal
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            try {
                $model->id = Generator::uuid4()->toString();
            } catch (Exception $e) {
                abort(500, $e->getMessage());
            }
        });
    }

    public function initializeIsIdentifiedByUuid()
    {
        $this->keyType = 'string';
    }

    protected function getUuidColumn(): string
    {
        return property_exists($this, 'uuid') ? $this->uuid: 'id';
    }
}