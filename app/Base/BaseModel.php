<?php

namespace App\Base;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Base\BaseModel
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Model onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Model query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Model withoutTrashed()
 * @method static Builder|BaseModel whereLike(string $field, string|int $value)
 * @method static Builder|BaseModel orWhereLike(string $field, string|int $value)
 *
 * @mixin Eloquent;
 */
class BaseModel extends Model
{
    use SoftDeletes;

    public function scopeWhereLike(Builder $query, string $field, string|int $value): Builder
    {
        return $query->where($field, 'like', implode('%', explode(' ', '%' . $value . '%')));
    }

    public function scopeOrWhereLike(Builder $query, string $field, string|int $value): Builder
    {
        return $query->orWhere($field, 'like', implode('%', explode(' ', '%' . $value . '%')));
    }
}
