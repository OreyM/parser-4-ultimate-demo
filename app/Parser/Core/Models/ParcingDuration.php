<?php

namespace App\Parser\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Parser\Core\Models\ParcingDuration
 *
 * @property int $id
 * @property int $total
 * @property int $difference
 * @property int $isBetter
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ParcingDuration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ParcingDuration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ParcingDuration query()
 * @method static \Illuminate\Database\Eloquent\Builder|ParcingDuration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParcingDuration whereDifference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParcingDuration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParcingDuration whereIsBetter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParcingDuration whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ParcingDuration whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ParcingDuration extends Model
{
    use HasFactory;

    protected $table = 'parcing_duration';

    protected $fillable = [
        'total',
        'difference',
        'isBetter',
    ];
}
