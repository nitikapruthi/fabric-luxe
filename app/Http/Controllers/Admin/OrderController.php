<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; use App\Models\Order; use Illuminate\Http\RedirectResponse; use Illuminate\Http\Request; use Illuminate\View\View;
class OrderController extends Controller { public function index(): View { return view('admin.orders.index',['orders'=>Order::latest()->paginate(20)]); } public function show(Order $order): View { return view('admin.orders.show',['order'=>$order->load('items')]); } public function update(Request $r,Order $order): RedirectResponse { $order->update($r->validate(['status'=>'required|in:placed,processing,shipped,delivered,cancelled'])); return back()->with('success','Order status updated.'); } }
