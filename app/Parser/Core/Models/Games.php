<?php

namespace App\Parser\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Parser\Core\Models\Games
 *
 * @property int $id
 * @property string $name
 * @property string $store_id
 * @property int $is_new
 * @property int $is_exist
 * @property string $category
 * @property string $slug
 * @property string|null $publisher
 * @property string|null $img_prewie
 * @property string|null $img_art
 * @property string|null $img_with_title
 * @property string $description
 * @property string $release_date
 * @property int $min_user_age
 * @property int $x360_support
 * @property int $xseries_support
 * @property string|null $game_capabilities
 * @property int $ru_local
 * @property string|null $all_local
 * @property float|null $rating
 * @property int $is_gold
 * @property int $is_gold_free
 * @property int $is_game_pass
 * @property int $is_ea
 * @property int $is_free
 * @property int $discount
 * @property float|null $selling_price
 * @property float|null $old_price
 * @property float|null $difference
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Games newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Games newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Games query()
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereAllLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereDifference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereGameCapabilities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereImgArt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereImgPrewie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereImgWithTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereIsEa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereIsExist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereIsFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereIsGamePass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereIsGold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereIsGoldFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereIsNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereMinUserAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games wherePublisher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereRuLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereSellingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereX360Support($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Games whereXseriesSupport($value)
 * @mixin \Eloquent
 */
class Games extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'store_id',
        'is_new',
        'is_exist',
        'category',
        'slug',
        'publisher',
        'img_prewie',
        'img_art',
        'img_with_title',
        'description',
        'release_date',
        'min_user_age',
        'x360_support',
        'xseries_support',
        'game_capabilities',
        'ru_local',
        'all_local',
        'rating',
        'is_gold',
        'is_gold_free',
        'is_game_pass',
        'is_ea',
        'is_free',
        'discount',
        'selling_price',
        'old_price',
        'difference',
    ];
}


