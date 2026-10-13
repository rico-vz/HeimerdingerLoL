<?php

namespace Database\Seeders\Concerns;

use Illuminate\Database\Eloquent\Model;

trait ComparesStoredAttributes
{
    private function hasAttributesChanged(Model $model, array $attributes): bool
    {
        foreach ($attributes as $key => $value) {
            $stored = $model->getRawOriginal($key);

            if ($stored !== null && $model->hasCast($key, ['array', 'json'])) {
                $stored = json_decode($stored, true);
            }

            if ($stored != $value) {
                return true;
            }
        }

        return false;
    }
}
