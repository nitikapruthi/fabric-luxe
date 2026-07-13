<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class StoreController extends Controller
{
    public function home(): View { return view('store.home', ['categories'=>Category::whereNull('parent_id')->withCount('products')->take(4)->get(), 'featured'=>Product::where('is_featured',true)->take(4)->get(), 'newArrivals'=>Product::where('is_new',true)->take(4)->get()]); }
    public function shop(Request $request): View { $selected=$request->category?Category::where('slug',$request->category)->first():null; $ids=$selected?array_merge([$selected->id],$selected->descendantIds()):[]; $products=Product::with('category')->when($selected,fn($q)=>$q->whereIn('category_id',$ids))->when($request->search,fn($q,$term)=>$q->where('name','like',"%{$term}%"))->when($request->sort==='low',fn($q)=>$q->orderBy('price'))->when($request->sort==='high',fn($q)=>$q->orderByDesc('price'))->latest()->paginate(12)->withQueryString(); return view('store.shop',compact('products'))->with('categories',Category::whereNull('parent_id')->with('children.children')->get()); }
    public function product(Product $product): View { return view('store.product', compact('product')); }
    public function cart(): View { return view('store.cart', ['items'=>$this->cartItems()]); }
    public function addToCart(Request $request, Product $product): RedirectResponse { $cart=session('cart',[]); $qty=max(1,(int)$request->input('quantity',1)); $cart[$product->id]=['id'=>$product->id,'name'=>$product->name,'price'=>(float)$product->price,'image'=>$product->image,'quantity'=>($cart[$product->id]['quantity'] ?? 0)+$qty]; session(['cart'=>$cart]); return back()->with('success',"{$product->name} added to your bag."); }
    public function updateCart(Request $request, Product $product): RedirectResponse { $cart=session('cart',[]); if(isset($cart[$product->id])) $cart[$product->id]['quantity']=max(1,(int)$request->quantity); session(['cart'=>$cart]); return back(); }
    public function removeFromCart(Product $product): RedirectResponse { $cart=session('cart',[]); unset($cart[$product->id]); session(['cart'=>$cart]); return back()->with('success','Item removed from your bag.'); }
    public function checkout(): View { return view('store.checkout',['items'=>$this->cartItems()]); }
    public function placeOrder(Request $request): RedirectResponse { $items=$this->cartItems(); abort_if(empty($items), 422, 'Your cart is empty.'); $data=$request->validate(['customer_name'=>'required|string|max:100','email'=>'required|email','phone'=>'required|string|max:20','address'=>'required|string|max:500','city'=>'required|string|max:100','postcode'=>'required|string|max:12','payment_method'=>'required|in:cod,upi']); $subtotal=collect($items)->sum('line_total'); $shipping=$subtotal>=999?0:99; $order=Order::create($data+['number'=>'FL-'.strtoupper(Str::random(7)),'subtotal'=>$subtotal,'shipping'=>$shipping,'total'=>$subtotal+$shipping,'status'=>'placed']); foreach($items as $item){$order->items()->create(['product_id'=>$item['id'],'name'=>$item['name'],'price'=>$item['price'],'quantity'=>$item['quantity'],'line_total'=>$item['line_total']]);} session()->forget('cart'); return to_route('order.thank-you',$order); }
    public function thankYou(Order $order): View { return view('store.thank-you',compact('order')); }
    private function cartItems(): array { return collect(session('cart',[]))->map(fn($item)=>$item+['line_total'=>$item['price']*$item['quantity']])->values()->all(); }
}
