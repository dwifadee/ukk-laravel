<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @mixin IdeHelperDetailOrder
 * @property int $id_detail_order
 * @property int $quantity
 * @property string $harga_satuan
 * @property string $total_harga
 * @property int $id_order
 * @property int $id_masakan
 * @property-read \App\Models\Masakan $masakan
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|DetailOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailOrder whereHargaSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailOrder whereIdDetailOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailOrder whereIdMasakan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailOrder whereIdOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailOrder whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailOrder whereTotalHarga($value)
 */
	class DetailOrder extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @mixin IdeHelperLevel
 * @property int $id_level
 * @property string $nama_level
 * @method static \Illuminate\Database\Eloquent\Builder|Level newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Level newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Level query()
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereIdLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereNamaLevel($value)
 */
	class Level extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @mixin IdeHelperMasakan
 * @property int $id_masakan
 * @property string $nama_masakan
 * @property int $harga
 * @property string $status_masakan
 * @property string|null $gambar
 * @method static \Illuminate\Database\Eloquent\Builder|Masakan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Masakan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Masakan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Masakan whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Masakan whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Masakan whereIdMasakan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Masakan whereNamaMasakan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Masakan whereStatusMasakan($value)
 */
	class Masakan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id_meja
 * @property string $no_meja
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|Meja newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meja newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meja query()
 * @method static \Illuminate\Database\Eloquent\Builder|Meja whereIdMeja($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meja whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meja whereNoMeja($value)
 */
	class Meja extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @mixin IdeHelperOrder
 * @property int $id_order
 * @property string $total_harga
 * @property string|null $nama_pemesan
 * @property string $status_pesanan
 * @property int $id_user
 * @property int|null $id_meja
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DetailOrder> $detailOrders
 * @property-read int|null $detail_orders_count
 * @property-read \App\Models\Meja|null $meja
 * @property-read \App\Models\Transaction|null $transaction
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIdMeja($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIdOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereNamaPemesan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatusPesanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotalHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $id_order
 * @property string $metode_pembayaran
 * @property string $status_pembayaran
 * @property string $total_bayar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereIdOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereMetodePembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatusPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereTotalBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @mixin IdeHelperUser
 * @property int $id_user
 * @property string $username
 * @property string $password
 * @property string $nama_user
 * @property int $id_level
 * @property string $created_at
 * @property-read \App\Models\Level $level
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNamaUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

