# Fabric Luxe

A Laravel 12 fabric ecommerce storefront with a responsive editorial UI, database-backed catalogue, filtering/search, product pages, session cart, and order checkout.

## Run locally

```powershell
cd C:\Users\dell\Documents\Codex\2026-07-13\i\outputs\fabric-luxe
php artisan serve
```

Open `http://127.0.0.1:8000`. The SQLite catalogue is already migrated and seeded. To reset demo data, run `php artisan migrate:fresh --seed`.

## Store capabilities

- Dynamic categories and products stored in SQLite
- Collection, keyword, and price sorting filters
- Product detail pages with fabric specifications
- Add, edit, and remove cart quantities
- Delivery calculation (free over ₹999)
- Checkout validation and persisted orders/order items

## Admin panel

Open `/admin` after starting the app. The seeded administrator is:

- Email: `admin@fabricluxe.test`
- Password: `ChangeMe123!`

The admin panel manages products, three-level collections (category → subcategory → sub-subcategory), and order status. Change the seeded password before deployment.

For production, add authentication/admin policies and connect a payment provider such as Razorpay or Stripe before taking live payments.
