<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Category extends Model {
    protected $fillable=['parent_id','name','slug','image','description'];
    public function parent(): BelongsTo { return $this->belongsTo(self::class,'parent_id'); }
    public function children(): HasMany { return $this->hasMany(self::class,'parent_id')->orderBy('name'); }
    public function products(): HasMany { return $this->hasMany(Product::class); }
    public function level(): int { return $this->parent?->parent_id ? 3 : ($this->parent_id ? 2 : 1); }
    public function descendantIds(): array { $this->loadMissing('children.children'); return collect($this->children)->flatMap(fn($child)=>array_merge([$child->id],$child->descendantIds()))->all(); }
}
