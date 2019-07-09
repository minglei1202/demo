<?php

namespace App\Transformers;

use App\Models\Region;
use League\Fractal\TransformerAbstract;

class RegionTransformer extends TransformerAbstract
{
    public function transform(Region $region)
    {
        $data = [
            'id' => $region->id,
            'name' => $region->name,
            'level' => $region->level,
            'pid' => $region->pid,
        ];
        return $data;
    }

}
