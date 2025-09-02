<?php

namespace App\Traits;

use App\Models\Heart;

trait HasHeart
{
    public function hearts()
    {
        return $this->morphMany(Heart::class, 'heartable');
    }

    public function isHearted()
    {
        if ($this->relationLoaded('hearts')) {
            return $this->hearts->isNotEmpty();
        }

        return $this->hearts()->where('user_id', 1)->exists();
    }

    public function heart()
    {
        $this->hearts()->create([
            'user_id' => 1,
        ]);
    }
    public function unheart()
    {
        $this->hearts()->where('user_id', 1)->delete();
    }
}
