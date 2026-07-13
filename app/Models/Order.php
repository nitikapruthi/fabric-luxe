<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Order extends Model { protected $fillable=['number','customer_name','email','phone','address','city','postcode','payment_method','subtotal','shipping','total','status']; protected function casts(): array { return ['subtotal'=>'decimal:2','shipping'=>'decimal:2','total'=>'decimal:2']; } public function items(): HasMany { return $this->hasMany(OrderItem::class); } }
