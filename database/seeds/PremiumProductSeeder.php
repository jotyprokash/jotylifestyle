<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Product;

class PremiumProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ensure Categories exist
        DB::table('categories')->updateOrInsert(['catname' => 'Men'], ['catname' => 'Men']);
        DB::table('sub_categories')->updateOrInsert(['subcatname' => 'T-Shirt'], ['catname' => 'Men', 'subcatname' => 'T-Shirt']);
        DB::table('sub_categories')->updateOrInsert(['subcatname' => 'Panjabi'], ['catname' => 'Men', 'subcatname' => 'Panjabi']);
        DB::table('sub_categories')->updateOrInsert(['subcatname' => 'Pant'], ['catname' => 'Men', 'subcatname' => 'Pant']);

        $products = [
            [
                'title' => 'Signature Essential White Tee',
                'description' => 'A masterclass in minimalism. Our Signature Essential White Tee is crafted from 100% premium long-staple cotton, offering unparalleled softness and a perfect tailored fit that elevates the everyday aesthetic.',
                'buyingprice' => 800,
                'sellingprice' => 1200,
                'color' => 'Classic White',
                'size' => 'M, L, XL',
                'totalquantity' => 100,
                'brand' => 'RedThread Signature',
                'fabric' => 'Premium Egyptian Cotton',
                'catname' => 'Men',
                'subcatname' => 'T-Shirt',
                'picture' => 'tshirt_premium.png',
                'postby' => 'Admin',
            ],
            [
                'title' => 'Midnight Navy Heritage Panjabi',
                'description' => 'Merging tradition with contemporary luxury. This Midnight Navy Panjabi features delicate tonal embroidery on the placket and cuffs, designed for the modern gentleman who values sophistication and artisanal craftsmanship.',
                'buyingprice' => 2500,
                'sellingprice' => 4500,
                'color' => 'Midnight Navy',
                'size' => '40, 42, 44',
                'totalquantity' => 50,
                'brand' => 'RedThread Heritage',
                'fabric' => 'Silk-Cotton Blend',
                'catname' => 'Men',
                'subcatname' => 'Panjabi',
                'picture' => 'panjabi_premium.png',
                'postby' => 'Admin',
            ],
            [
                'title' => 'Modern Slim Charcoal Chinos',
                'description' => 'The cornerstone of a versatile wardrobe. These charcoal chinos are engineered with a hint of stretch for movement, featuring a clean, flat-front design and a refined tapered silhouette suitable for both boardroom and brunch.',
                'buyingprice' => 1200,
                'sellingprice' => 2200,
                'color' => 'Charcoal Grey',
                'size' => '30, 32, 34, 36',
                'totalquantity' => 80,
                'brand' => 'RedThread Modern',
                'fabric' => 'Cotton-Elastane Twill',
                'catname' => 'Men',
                'subcatname' => 'Pant',
                'picture' => 'pants_premium.png',
                'postby' => 'Admin',
            ],
        ];

        foreach ($products as $productData) {
            Product::updateOrCreate(['title' => $productData['title']], $productData);
        }
    }
}
