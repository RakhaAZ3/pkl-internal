<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil ID kategori berdasarkan slug
        $categories = Category::pluck('id', 'slug');

        $products = [
            // ================= JERSEY =================
            [
                'name'        => 'Jersey Sepak Bola Sekolah',
                'category'    => 'jersey',
                'price'       => 75000,
                'image'       => 'jersey-1.png',
                'description' => 'Jersey olaharga berbahan dry-fit yang nyaman digunakan untuk latihan maupun pertandingan sekolah.',
            ],
            [
                'name'        => 'Jersey Futsal',
                'category'    => 'jersey',
                'price'       => 180000,
                'image'       => 'jersey-2.png',
                'description' => 'Bahan Drifit Teknologi Cepat Kering. Desain Agresif & Dinamis.',
            ],

            // ================= SEPATU =================
            [
                'name'        => 'Adizero EVO SL Mens Running Shoes - White',
                'category'    => 'sepatu-olahraga',
                'price'       => 2500000,
                'image'       => 'sepatu-lari.png',
                'description' => 'Rasakan sensasi kecepatan dalam Adizero Evo SL. Terinspirasi oleh inovasi sepatu pemecah rekor dalam keluarga lari Adizero - khususnya Pro Evo 1 - Evo SL dirancang untuk Anda gunakan berlari, atau tidak. Menggabungkan teknologi Adizero dengan estetika berani dan unik yang terinspirasi dari balap, sepatu ini adalah evolusi kecepatan dalam segala aspek kehidupan. Lapisan responsif busa LIGHTSTRIKE PRO di solnya memberikan kenyamanan dan bantalan untuk pengembalian energi yang optimal.',
            ],
            [
                'name'        => 'Phantom 6 Low Club Indoor/Court Soccer Shoes - Blue',
                'category'    => 'sepatu-olahraga',
                'price'       => 949000,
                'image'       => 'sepatu-futsal.png',
                'description' => 'Baik kamu baru mulai atau hanya bermain untuk bersenang-senang, sepatu cleat Club membawamu ke lapangan tanpa mengorbankan kualitas. Phantom 6 memiliki bagian atas yang menyesuaikan dengan bentuk kakimu, sehingga kamu lebih dekat dengan bola saat menggiring, mengoper, dan menembak.',
            ],

            // ================= TAS =================
            [
                'name'        => 'Skecher City Groove Mens Sling Bag - Olive',
                'category'    => 'tas',
                'price'       => 359000,
                'image'       => 'tas-olahraga.png',
                'description' => 'Tampilan yang ramping kini berpadu dengan fungsionalitas dalam tas Skechers City Groove Sling Bag yang berukuran kecil namun tetap menarik. Tas klasik ini memiliki kompartemen utama berrisleting yang dapat anda gunakan untuk menyimpan segala keperluan sehari-hari anda, serta padding yang nyaman di bagian belakang dan strap yang dapat anda sesuaikan agar anda dapat membawa tas ini ke manapun anda pergi dengan mudah.',
            ],
            [
                'name'        => 'Weekend Mens Backpack - Green',
                'category'    => 'tas',
                'price'       => 399000,
                'image'       => 'tas-sepatu.png',
                'description' => 'Siapkan diri anda untuk menjalani hari dengan tas Skechers Weekend Backpack klasik ini. Tas ini hadir dengan tampilan warna-warna solid serta dilengkapi dengan kompartemen utama dan kompartemen di bagian depan yang dilengkapi dengan risleting, serta dengan saku di bagian samping.',
            ],

            // ================= AKSESORIS =================
            [
                'name'        => 'Stacked Patch 3 Packs Mens Quarter Socks - White/Denim/Black',
                'category'    => 'aksesoris',
                'price'       => 139300,
                'image'       => 'kaos-kaki.png',
                'description' => 'KAUS KAKI QUARTER DENGAN LOGO BERTUMPUK ISI 3

                                Kaus Kaki Quarter dengan Logo Bertumpuk untuk Pria Merek Converse Isi 3 - Putih/Denim/Hitam

                                Detail Produk
                                Compression Arch
                                Ventilasi di Bagian Jari
                                2X1 Rib Leg
                                Half Cushion
                                Rajutan Logo @ Di Bagian Luar Kaki
                                Jacquard Art @ Di Bagian Alas Kaki
                                Campuran Poli, 144N',
            ],
            [
                'name'        => 'Refuel Bottle 24 Oz - Black',
                'category'    => 'aksesoris',
                'price'       => 239200,
                'image'       => 'botol-minum.png',
                'description' => 'Didesain agar mudah digenggam untuk hidrasi cepat dan praktis saat beraktivitas.',
            ],

            // ================= BOLA =================
            [
                'name'        => 'Bola volly Mikasa',
                'category'    => 'bola',
                'price'       => 405000,
                'image'       => 'bola-voli.png',
                'description' => 'Spesifikasi :
                                    - Size 5
                                    - Bahan Kulit PU, Lembut & tidak sakit ditangan
                                    - Tebal & tidak mudah kelupas kulit
                                    - Berkualitas & tahan lama
                                    Harga per Unit',
            ],
            [
                'name'        => 'Bola Sepak',
                'category'    => 'bola',
                'price'       => 721500,
                'image'       => 'bola-sepak.png',
                'description' => 'Bola sepak berkualitas dengan bahan kuat dan jahitan rapi, cocok untuk latihan dan pertandingan sekolah.',
            ],
        ];

        // LOOP CREATE PRODUCT
        foreach ($products as $productData) {
            // Cek kategori agar tidak error jika slug tidak pas
            $categoryId = $categories[$productData['category']] ?? null;

            if ($categoryId) {
                $product = Product::create([
                    'category_id' => $categoryId,
                    'name'        => $productData['name'],
                    'slug'        => Str::slug($productData['name'] . '-' . Str::random(5)),
                    'description' => $productData['description'],
                    'price'       => $productData['price'],
                    'stock'       => rand(75, 100),
                    'weight'      => rand(300, 700),
                    'image'       => $productData['image'],
                    'is_active'   => true,
                    'is_featured' => rand(0, 1),
                ]);

                // Sinkronisasi ke tabel ProductImages
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => 'products/' . $productData['image'],
                    'is_primary' => true,
                    'sort_order' => 0,
                ]);
            }
        }

        $this->command->info('Berhasil input ' . Product::count() . ' produk ke database.');
    }
}