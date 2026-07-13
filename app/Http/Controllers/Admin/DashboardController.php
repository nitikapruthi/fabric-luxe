<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; use App\Models\Category; use App\Models\Order; use App\Models\Product; use Illuminate\View\View;
class DashboardController extends Controller { public function __invoke(): View { return view('admin.dashboard',['productCount'=>Product::count(),'categoryCount'=>Category::count(),'orderCount'=>Order::count(),'revenue'=>Order::sum('total'),'recentOrders'=>Order::latest()->take(6)->get()]); } }
