<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('languages')->insert([
            ['id' => 1, 'name' => "English", 'flag' => "", 'abbr' => "en", 'script' => "", 'native' => "English", 'active' => 1, 'default' => 1,],
            ['id' => 2, 'name' => "Arabic", 'flag' => "", 'abbr' => "ar", 'script' => "", 'native' => "العربية", 'active' => 1, 'default' => 0,],
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@app.com',
            'password' => Hash::make('admin1234'),
        ]);

        DB::table('permissions')->insert([
            ["id" => 1, "name" => "View Dashboard", "guard_name" => "web"],
            ["id" => 2, "name" => "Manage Authentication", "guard_name" => "web"],
            ["id" => 3, "name" => "View Translations", "guard_name" => "web"],
            ["id" => 4, "name" => "Manage Translations", "guard_name" => "web"],
            ["id" => 5, "name" => "View Sliders", "guard_name" => "web"],
            ["id" => 6, "name" => "Manage Sliders", "guard_name" => "web"],
            ["id" => 7, "name" => "View Site Texts", "guard_name" => "web"],
            ["id" => 8, "name" => "Manage Site Texts", "guard_name" => "web"],
            ["id" => 9, "name" => "View Contacts", "guard_name" => "web"],
            ["id" => 10, "name" => "Manage Contacts", "guard_name" => "web"],
            ["id" => 11, "name" => "View Socials", "guard_name" => "web"],
            ["id" => 12, "name" => "Manage Socials", "guard_name" => "web"],
            ["id" => 13, "name" => "View News Letters", "guard_name" => "web"],
            ["id" => 14, "name" => "Manage News Letters", "guard_name" => "web"],
            ["id" => 15, "name" => "View Faqs", "guard_name" => "web"],
            ["id" => 16, "name" => "Manage Faqs", "guard_name" => "web"],
            ["id" => 17, "name" => "View Countries", "guard_name" => "web"],
            ["id" => 18, "name" => "Manage Countries", "guard_name" => "web"],
            ["id" => 19, "name" => "View States", "guard_name" => "web"],
            ["id" => 20, "name" => "Manage States", "guard_name" => "web"],
            ["id" => 21, "name" => "View Colors", "guard_name" => "web"],
            ["id" => 22, "name" => "Manage Colors", "guard_name" => "web"],
            ["id" => 23, "name" => "View Sizes", "guard_name" => "web"],
            ["id" => 24, "name" => "Manage Sizes", "guard_name" => "web"],
            ["id" => 25, "name" => "View Categories", "guard_name" => "web"],
            ["id" => 26, "name" => "Manage Categories", "guard_name" => "web"],
            ["id" => 27, "name" => "View Shipping Companies", "guard_name" => "web"],
            ["id" => 28, "name" => "Manage Shipping Companies", "guard_name" => "web"],
            ["id" => 29, "name" => "View Coupons", "guard_name" => "web"],
            ["id" => 30, "name" => "Manage Coupons", "guard_name" => "web"],
            ["id" => 31, "name" => "View Order Statuses", "guard_name" => "web"],
            ["id" => 32, "name" => "Manage Order Statuses", "guard_name" => "web"],
            ["id" => 33, "name" => "View Products", "guard_name" => "web"],
            ["id" => 34, "name" => "Manage Products", "guard_name" => "web"],
            ["id" => 35, "name" => "View Contact Requests", "guard_name" => "web"],
            ["id" => 36, "name" => "Manage Contact Requests", "guard_name" => "web"],
            ["id" => 37, "name" => "View Customers", "guard_name" => "web"],
            ["id" => 38, "name" => "Manage Customers", "guard_name" => "web"],
            ["id" => 39, "name" => "View Orders", "guard_name" => "web"],
            ["id" => 40, "name" => "Manage Orders", "guard_name" => "web"],
        ]);

        DB::table('roles')->insert([
            ["id" => 1, "name" => "Super Admin", "guard_name" => "web"]
        ]);

        DB::table('model_has_roles')->insert([
            ["role_id" => 1, "model_type" => "App\Models\User", "model_id" => "1"],
        ]);

        DB::table('role_has_permissions')->insert([
            ["permission_id" => 1, "role_id" => 1],
            ["permission_id" => 2, "role_id" => 1],
            ["permission_id" => 3, "role_id" => 1],
            ["permission_id" => 4, "role_id" => 1],
            ["permission_id" => 5, "role_id" => 1],
            ["permission_id" => 6, "role_id" => 1],
            ["permission_id" => 7, "role_id" => 1],
            ["permission_id" => 8, "role_id" => 1],
            ["permission_id" => 9, "role_id" => 1],
            ["permission_id" => 10, "role_id" => 1],
            ["permission_id" => 11, "role_id" => 1],
            ["permission_id" => 12, "role_id" => 1],
            ["permission_id" => 13, "role_id" => 1],
            ["permission_id" => 14, "role_id" => 1],
            ["permission_id" => 15, "role_id" => 1],
            ["permission_id" => 16, "role_id" => 1],
            ["permission_id" => 17, "role_id" => 1],
            ["permission_id" => 18, "role_id" => 1],
            ["permission_id" => 19, "role_id" => 1],
            ["permission_id" => 20, "role_id" => 1],
            ["permission_id" => 21, "role_id" => 1],
            ["permission_id" => 22, "role_id" => 1],
            ["permission_id" => 23, "role_id" => 1],
            ["permission_id" => 24, "role_id" => 1],
            ["permission_id" => 25, "role_id" => 1],
            ["permission_id" => 26, "role_id" => 1],
            ["permission_id" => 27, "role_id" => 1],
            ["permission_id" => 28, "role_id" => 1],
            ["permission_id" => 29, "role_id" => 1],
            ["permission_id" => 30, "role_id" => 1],
            ["permission_id" => 31, "role_id" => 1],
            ["permission_id" => 32, "role_id" => 1],
            ["permission_id" => 33, "role_id" => 1],
            ["permission_id" => 34, "role_id" => 1],
            ["permission_id" => 35, "role_id" => 1],
            ["permission_id" => 36, "role_id" => 1],
            ["permission_id" => 37, "role_id" => 1],
            ["permission_id" => 38, "role_id" => 1],
            ["permission_id" => 39, "role_id" => 1],
            ["permission_id" => 40, "role_id" => 1],
        ]);

        DB::table('countries')->insert([
            [
                "code" => "US",
                "name" => '{"en":"United States","ar":"الولايات المتحدة"}',
                "country_code" => "1",
                "currency" => "$",
                "currency_to_usd" => 1,
                "flag" => "images/flags/Flag_of_the_United_States.png",
                "digits_after_country_code" => 10,
            ],
            [
                "code" => "JO",
                "name" => '{"en":"Jordan","ar":"الاردن"}',
                "country_code" => "962",
                "currency" => "JOD",
                "currency_to_usd" => 0.71,
                "flag" => "images/flags/Flag_of_Jordan.png",
                "digits_after_country_code" => 9,
            ],
        ]);

        DB::table('states')->insert(
            [
                ["id" => 1, "name" => '{"en":"Alabama","ar":"ألاباما"}', "country_id" => 1],
                ["id" => 2, "name" => '{"en":"Alaska","ar":"ألاسكا"}', "country_id" => 1],
                ["id" => 3, "name" => '{"en":"Arizona","ar":"أريزونا"}', "country_id" => 1],
                ["id" => 4, "name" => '{"en":"Arkansas","ar":"أركنساس"}', "country_id" => 1],
                ["id" => 5, "name" => '{"en":"California","ar":"كاليفورنيا"}', "country_id" => 1],
                ["id" => 6, "name" => '{"en":"Colorado","ar":"كولورادو"}', "country_id" => 1],
                ["id" => 7, "name" => '{"en":"Connecticut","ar":"كونيتيكت"}', "country_id" => 1],
                ["id" => 8, "name" => '{"en":"Delaware","ar":"ديلاوير"}', "country_id" => 1],
                ["id" => 9, "name" => '{"en":"Florida","ar":"فلوريدا"}', "country_id" => 1],
                ["id" => 10, "name" => '{"en":"Georgia","ar":"جورجيا"}', "country_id" => 1],
                ["id" => 11, "name" => '{"en":"Hawaii","ar":"هاواي"}', "country_id" => 1],
                ["id" => 12, "name" => '{"en":"Idaho","ar":"أيداهو"}', "country_id" => 1],
                ["id" => 13, "name" => '{"en":"Illinois","ar":"إلينوي"}', "country_id" => 1],
                ["id" => 14, "name" => '{"en":"Indiana","ar":"إنديانا"}', "country_id" => 1],
                ["id" => 15, "name" => '{"en":"Iowa","ar":"أيوا"}', "country_id" => 1],
                ["id" => 16, "name" => '{"en":"Kansas","ar":"كانساس"}', "country_id" => 1],
                ["id" => 17, "name" => '{"en":"Kentucky","ar":"كنتاكي"}', "country_id" => 1],
                ["id" => 18, "name" => '{"en":"Louisiana","ar":"لويزيانا"}', "country_id" => 1],
                ["id" => 19, "name" => '{"en":"Maine","ar":"مين"}', "country_id" => 1],
                ["id" => 20, "name" => '{"en":"Maryland","ar":"ميريلاند"}', "country_id" => 1],
                ["id" => 21, "name" => '{"en":"Massachusetts","ar":"ماساتشوستس"}', "country_id" => 1],
                ["id" => 22, "name" => '{"en":"Michigan","ar":"ميشيغان"}', "country_id" => 1],
                ["id" => 23, "name" => '{"en":"Minnesota","ar":"مينيسوتا"}', "country_id" => 1],
                ["id" => 24, "name" => '{"en":"Mississippi","ar":"مسيسيبي"}', "country_id" => 1],
                ["id" => 25, "name" => '{"en":"Missouri","ar":"ميزوري"}', "country_id" => 1],
                ["id" => 26, "name" => '{"en":"Montana","ar":"مونتانا"}', "country_id" => 1],
                ["id" => 27, "name" => '{"en":"Nebraska","ar":"نبراسكا"}', "country_id" => 1],
                ["id" => 28, "name" => '{"en":"Nevada","ar":"نيفادا"}', "country_id" => 1],
                ["id" => 29, "name" => '{"en":"New Hampshire","ar":"نيو هامبشاير"}', "country_id" => 1],
                ["id" => 30, "name" => '{"en":"New Jersey","ar":"نيو جيرسي"}', "country_id" => 1],
                ["id" => 31, "name" => '{"en":"New Mexico","ar":"نيو مكسيكو"}', "country_id" => 1],
                ["id" => 32, "name" => '{"en":"New York","ar":"نيويورك"}', "country_id" => 1],
                ["id" => 33, "name" => '{"en":"North Carolina","ar":"كارولاينا الشمالية"}', "country_id" => 1],
                ["id" => 34, "name" => '{"en":"North Dakota","ar":"داكوتا الشمالية"}', "country_id" => 1],
                ["id" => 35, "name" => '{"en":"Ohio","ar":"أوهايو"}', "country_id" => 1],
                ["id" => 36, "name" => '{"en":"Oklahoma","ar":"أوكلاهوما"}', "country_id" => 1],
                ["id" => 37, "name" => '{"en":"Oregon","ar":"أوريغون"}', "country_id" => 1],
                ["id" => 38, "name" => '{"en":"Pennsylvania","ar":"بنسيلفانيا"}', "country_id" => 1],
                ["id" => 39, "name" => '{"en":"Rhode Island","ar":"رود آيلاند"}', "country_id" => 1],
                ["id" => 40, "name" => '{"en":"South Carolina","ar":"كارولاينا الجنوبية"}', "country_id" => 1],
                ["id" => 41, "name" => '{"en":"South Dakota","ar":"داكوتا الجنوبية"}', "country_id" => 1],
                ["id" => 42, "name" => '{"en":"Tennessee","ar":"تينيسي"}', "country_id" => 1],
                ["id" => 43, "name" => '{"en":"Texas","ar":"تكساس"}', "country_id" => 1],
                ["id" => 44, "name" => '{"en":"Utah","ar":"يوتا"}', "country_id" => 1],
                ["id" => 45, "name" => '{"en":"Vermont","ar":"فيرمونت"}', "country_id" => 1],
                ["id" => 46, "name" => '{"en":"Virginia","ar":"فرجينيا"}', "country_id" => 1],
                ["id" => 47, "name" => '{"en":"Washington","ar":"واشنطن"}', "country_id" => 1],
                ["id" => 48, "name" => '{"en":"West Virginia","ar":"فيرجينيا الغربية"}', "country_id" => 1],
                ["id" => 49, "name" => '{"en":"Wisconsin","ar":"ويسكونسن"}', "country_id" => 1],
                ["id" => 50, "name" => '{"en":"Wyoming","ar":"وايومنغ"}', "country_id" => 1],

                ["id" => 51, "name" => '{"en":"Amman","ar":"عمان"}', "country_id" => 2],
                ["id" => 52, "name" => '{"en":"Irbid","ar":"إربد"}', "country_id" => 2],
                ["id" => 53, "name" => '{"en":"Zarqa","ar":"الزرقاء"}', "country_id" => 2],
                ["id" => 54, "name" => '{"en":"Balqa","ar":"البلقاء"}', "country_id" => 2],
                ["id" => 55, "name" => '{"en":"Mafraq","ar":"المفرق"}', "country_id" => 2],
                ["id" => 56, "name" => '{"en":"Karak","ar":"الكرك"}', "country_id" => 2],
                ["id" => 57, "name" => '{"en":"Jerash","ar":"جرش"}', "country_id" => 2],
                ["id" => 58, "name" => '{"en":"Madaba","ar":"مادبا"}', "country_id" => 2],
                ["id" => 59, "name" => '{"en":"Ajloun","ar":"عجلون"}', "country_id" => 2],
                ["id" => 60, "name" => '{"en":"Aqaba","ar":"العقبة"}', "country_id" => 2],
                ["id" => 61, "name" => '{"en":"Tafilah","ar":"الطفيلة"}', "country_id" => 2],
                ["id" => 62, "name" => '{"en":"Maan","ar":"معان"}', "country_id" => 1],
            ]
        );

        DB::table('colors')->insert([
            [
                "name" => '{"en":"Red","ar":"احمر"}',
                "hex" => "#ff0000",
            ],
            [
                "name" => '{"en":"Green","ar":"اخضر"}',
                "hex" => "#00ff00",
            ],
            [
                "name" => '{"en":"Blue","ar":"ازرق"}',
                "hex" => "#0000ff",
            ],
        ]);

        DB::table('sizes')->insert([
            [
                "name" => '{"en":"3XL"}',
            ],
            [
                "name" => '{"en":"XXL"}',
            ],
            [
                "name" => '{"en":"XL"}',
            ],
            [
                "name" => '{"en":"L"}',
            ],
            [
                "name" => '{"en":"M"}',
            ],
            [
                "name" => '{"en":"S"}',
            ],
            [
                "name" => '{"en":"XS"}',
            ],
            [
                "name" => '{"en":"XXS"}',
            ],
            [
                "name" => '{"en":"3XS"}',
            ],
        ]);

        DB::table('categories')->insert([
            [
                "name" => '{"en":"Category 1","ar":"فئة 1"}',
                "image" => 'images/banner-01.jpg',
            ],
            [
                "name" => '{"en":"Category 2","ar":"فئة 2"}',
                "image" => 'images/banner-02.jpg',
            ],
            [
                "name" => '{"en":"Category 3","ar":"فئة 3"}',
                "image" => 'images/banner-03.jpg',
            ],
        ]);

        Product::factory(16)->create()->each(function ($product) {
            for ($i = 0; $i < 4; $i++) {
                ProductImage::factory()->create(['product_id' => $product->id]);
            }
        });

        DB::table('coupons')->insert([
            [
                "name" => 'C10%',
                "discount" => 10,
            ],
        ]);

        DB::table('sliders')->insert([
            [
                "title" => '{"en":"slider 1","ar":"سلايدر 1"}',
                "description" => '{"en":"slider 1 description","ar":"وصف سلايدر 1"}',
                "animation" => "rollIn",
                "image" => 'images/slide-01.jpg',
            ],
            [
                "title" => '{"en":"slider 2","ar":"سلايدر 2"}',
                "description" => '{"en":"slider 2 description","ar":"وصف سلايدر 2"}',
                "animation" => "rollIn",
                "image" => 'images/slide-02.jpg',
            ],
            [
                "title" => '{"en":"slider 3","ar":"سلايدر 3"}',
                "description" => '{"en":"slider 3 description","ar":"وصف سلايدر 3"}',
                "animation" => "rollIn",
                "image" => 'images/slide-03.jpg',
            ],
        ]);

        DB::table('site_texts')->insert([
            [
                "name" => '{"en":"Our Story","ar":"قصتنا"}',
                "description" => '{"en":"Our Story","ar":"قصتنا"}',
                "image" => 'images/about-01.jpg',
            ],
            [
                "name" => '{"en":"Our Mission","ar":"مهمتنا"}',
                "description" => '{"en":"Our Mission","ar":"مهمتنا"}',
                "image" => 'images/about-02.jpg',
            ],
            [
                "name" => '{"en":"Return Policy","ar":"سياسة الارجاع"}',
                "description" => '{"en":"Return Policy","ar":"سياسة الارجاع"}',
                "image" => '',
            ],
        ]);

        DB::table('contacts')->insert([
            [
                "email" => 'contact@example.com',
                "phone" => '+18001236879',
                "address" => '{"en":"Coza Store Center 8th floor, 379 Hudson St, New York, NY 10018 US","ar":"Coza Store Center 8th floor, 379 Hudson St, New York, NY 10018 US"}',
                "maps" => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13540.272853727658!2d35.922437300866676!3d31.95904609187095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151b5f28a9a44d8b%3A0xa0ff3747b032ada!2sManara%20-%20Arts%20%26%20Culture!5e0!3m2!1sen!2sjo!4v1718316721284!5m2!1sen!2sjo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ],
        ]);

        DB::table('socials')->insert([
            [
                "icon" => 'fa fa-facebook',
                "link" => 'https://facebook.com',
            ],
            [
                "icon" => 'fa fa-instagram',
                "link" => 'https://instagram.com',
            ],
            [
                "icon" => 'fa fa-pinterest-p',
                "link" => 'https://pinterest.com',
            ],
        ]);

        DB::table('shipping_companies')->insert([
            [
                "name" => '{"en":"By us","ar":"عن طريقنا"}',
                "cost_price" => 7,
                "selling_price" => 10,
            ],
        ]);

        DB::table('faqs')->insert([
            [
                "question" => '{"en":"question 1","ar":"question ar 1"}',
                "answer" => '{"en":"answer 1","ar":"answer ar 1"}',
            ],
            [
                "question" => '{"en":"question 2","ar":"question ar 2"}',
                "answer" => '{"en":"answer 2","ar":"answer ar 2"}',
            ],
            [
                "question" => '{"en":"question 3","ar":"question ar 3"}',
                "answer" => '{"en":"answer 3","ar":"answer ar 3"}',
            ],
        ]);
    }
}
