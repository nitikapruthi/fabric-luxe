<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Product extends Model { protected $fillable=['category_id','name','slug','description','price','compare_at_price','image','color','material','width','stock','is_featured','is_new']; protected function casts(): array { return ['price'=>'decimal:2','compare_at_price'=>'decimal:2','is_featured'=>'boolean','is_new'=>'boolean']; } public function category(): BelongsTo { return $this->belongsTo(Category::class); } }
