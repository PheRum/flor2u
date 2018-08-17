<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Partner
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $email
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Partner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Partner whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Partner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Partner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Partner whereUpdatedAt($value)
 */
class Partner extends Model
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public function getPartnersFields()
    {
        $data = cache()->remember('partner_field_html', 5, function () {
            return self::pluck('name', 'id');
        });

        return $data;
    }
}
