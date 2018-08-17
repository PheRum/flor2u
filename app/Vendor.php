<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Vendor
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $email
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vendor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vendor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vendor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vendor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vendor whereUpdatedAt($value)
 */
class Vendor extends Model
{
    //
}
