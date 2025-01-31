
# Laravel E-Ticaret API Projesi

## Kurulum
```bash
git clone https://github.com/haliltuksal/laravel-moneo.git
cd .\laravel-moneo\
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
```

## API Endpoints

```http
  GET /api/products  - Tüm ürünleri listele
```
#

```http
  GET /api/cart/{cart_id}/total - Sepet toplamını hesapla
```
#

```http
  POST /api/cart - Yeni sepet oluştur
```

| Parametre | Tip     | Açıklama                       |
| :-------- | :------- | :-------------------------------- |
| `user_id` | `integer` | **user_id**  |

#

```http
  POST /api/cart/{cart_id}/items - Sepete ürün ekle
```

| Parametre | Tip     | Açıklama                       |
| :-------- | :------- | :-------------------------------- |
| `product_id` | `integer` | **product_id** |
| `quantity` | `integer` | **adet(miktar)**  |

#

## Mimari Yapı

**Repository Pattern**

ProductRepository ve CartRepository sınıfları veritabanı işlemlerini yönetir
Interface'ler üzerinden dependency injection sağlanır

**Service Layer**

CartService: Sepet işlemleri ve iş mantığı
Toplam hesaplama, ürün ekleme gibi işlemler service katmanında yapılır

**Event-Listener**

**CartTotalCalculated** eventi ile sepet toplamı hesaplandığında loglama yapılır

## Tasarım Desenleri
- Repository Pattern: Veri erişim katmanını soyutlar
- Service Layer: İş mantığını controller'lardan ayırır
- Dependency Injection: Bağımlılıkları gevşek bağlar
- Event-Listener: Asenkron işlemler için event sistemi


## Test
```bash
php artisan test
```
