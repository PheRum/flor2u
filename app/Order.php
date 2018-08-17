<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property-read \App\Partner $partner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @mixin \Eloquent
 * @property int $id
 * @property int $status
 * @property string $client_email
 * @property int $partner_id
 * @property string $delivery_dt
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereClientEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereDeliveryDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePartnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Vendor[] $vendors
 */
class Order extends Model
{
    const ORDER_STATUS_NEW = 0;
    const ORDER_STATUS_CONFIRMED = 10;
    const ORDER_STATUS_COMPLETED = 20;

    /** @var array */
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot([
            'price',
            'quantity',
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vendors()
    {
        return $this->hasMany(Vendor::class);
    }

    /**
     * @return float|int
     */
    public function getPrice()
    {
        $total = 0;
        $products = $this->products;

        foreach ($products as $product) {
            $total += $product->pivot->quantity * $product->pivot->price;
        }

        return $total;
    }

    /**
     * @param null $status
     * @return array|mixed
     */
    public function getStatus($status = null)
    {
        $data = [
            self::ORDER_STATUS_NEW => 'Новый',
            self::ORDER_STATUS_CONFIRMED => 'Подтвержден',
            self::ORDER_STATUS_COMPLETED => 'Завершен',
        ];

        if ($status !== null) {
            if (!isset($data[$status])) {
                return '---';
            }

            return $data[$status];
        }

        return collect($data)->toArray();
    }
}
