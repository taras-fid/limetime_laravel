<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use HasFactory;

    public function rating($catalogs): int
    {
        foreach ($catalogs as $catalog) {
            $stars = $catalog->stars;
            $rev_count = $catalog->rev_count;
            $sum_stars = 0;

            foreach ($stars as $star) {
                $sum_stars += $star;
            }

            $rating = intval($sum_stars/$rev_count);
        }
        return $rating;
    }
}
