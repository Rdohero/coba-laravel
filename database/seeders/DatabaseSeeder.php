<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Kelas;
use App\Models\Post;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**php artisan db:seed
     * Seed the application's database.
     */
    public function run(): void
    {
//        User::create([
//            'name' => 'Sandika Galih',
//            'email' => 'sandikagalih@gmail.com',
//            'password' => bcrypt('12345'),
//        ]);
//
        User::create([
            'name' => 'Roja Ridho Robbihi',
            'username' => 'Rdohero',
            'email' => 'rojaridho8888@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('ridho'),
            'remember_token' => Str::random(10),
            'is_admin' => true,
        ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programing',
            'slug' => 'web-programming',
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Post::factory(20)->create();

        Kelas::create([
            'kelas' => '11 PPLG 1',
        ]);

        Kelas::create([
            'kelas' => '11 PPLG 2',
        ]);

        Kelas::create([
            'kelas' => '10 PPLG 1',
        ]);

        Kelas::create([
            'kelas' => '10 PPLG 2',
        ]);

        Student::factory(5)->create();

//        Post::create([
//            'title' => 'Judul Pertama',
//            'slug' => 'judul-pertama',
//            'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. A assumenda, voluptates velit neque tempore fuga veritatis aperiam molestiae amet, rerum nisi suscipit repellendus corrupti magnam repellat molestias in praesentium laudantium quis,',
//            'body' => '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A assumenda, voluptates velit neque tempore fuga veritatis aperiam molestiae amet, rerum nisi suscipit repellendus corrupti magnam repellat molestias in praesentium laudantium quis, dignissimos delectus officia consectetur quisquam commodi? Iure tempore dolor incidunt quod! Facere provident beatae enim exercitationem doloribus placeat.</p><p>Voluptatem quos earum ipsam provident neque suscipit eveniet perferendis expedita repellendus tempore beatae illo ipsa id optio, ea eius impedit! Ipsum, quos? Quam ratione, incidunt quas dolorem quibusdam blanditiis ut optio aut numquam odit dolorum? Culpa neque quasi recusandae deserunt nisi commodi facilis aliquam, libero molestias dignissimos doloremque blanditiis natus soluta.</p>',
//            'category_id' => 1,
//            'user_id' => 4,
//        ]);
//
//        Post::create([
//            'title' => 'Judul Kedua',
//            'slug' => 'judul-kedua',
//            'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. A assumenda, voluptates velit neque tempore fuga veritatis aperiam molestiae amet, rerum nisi suscipit repellendus corrupti magnam repellat molestias in praesentium laudantium quis,',
//            'body' => '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A assumenda, voluptates velit neque tempore fuga veritatis aperiam molestiae amet, rerum nisi suscipit repellendus corrupti magnam repellat molestias in praesentium laudantium quis, dignissimos delectus officia consectetur quisquam commodi? Iure tempore dolor incidunt quod! Facere provident beatae enim exercitationem doloribus placeat.</p><p>Voluptatem quos earum ipsam provident neque suscipit eveniet perferendis expedita repellendus tempore beatae illo ipsa id optio, ea eius impedit! Ipsum, quos? Quam ratione, incidunt quas dolorem quibusdam blanditiis ut optio aut numquam odit dolorum? Culpa neque quasi recusandae deserunt nisi commodi facilis aliquam, libero molestias dignissimos doloremque blanditiis natus soluta.</p>',
//            'category_id' => 1,
//            'user_id' => 1,
//        ]);
//
//        Post::create([
//            'title' => 'Judul Ketiga',
//            'slug' => 'judul-ketiga',
//            'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. A assumenda, voluptates velit neque tempore fuga veritatis aperiam molestiae amet, rerum nisi suscipit repellendus corrupti magnam repellat molestias in praesentium laudantium quis,',
//            'body' => '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A assumenda, voluptates velit neque tempore fuga veritatis aperiam molestiae amet, rerum nisi suscipit repellendus corrupti magnam repellat molestias in praesentium laudantium quis, dignissimos delectus officia consectetur quisquam commodi? Iure tempore dolor incidunt quod! Facere provident beatae enim exercitationem doloribus placeat.</p><p>Voluptatem quos earum ipsam provident neque suscipit eveniet perferendis expedita repellendus tempore beatae illo ipsa id optio, ea eius impedit! Ipsum, quos? Quam ratione, incidunt quas dolorem quibusdam blanditiis ut optio aut numquam odit dolorum? Culpa neque quasi recusandae deserunt nisi commodi facilis aliquam, libero molestias dignissimos doloremque blanditiis natus soluta.</p>',
//            'category_id' => 2,
//            'user_id' => 1,
//        ]);
//
//        Post::create([
//            'title' => 'Judul Keempat',
//            'slug' => 'judul-keempat',
//            'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. A assumenda, voluptates velit neque tempore fuga veritatis aperiam molestiae amet, rerum nisi suscipit repellendus corrupti magnam repellat molestias in praesentium laudantium quis,',
//            'body' => '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A assumenda, voluptates velit neque tempore fuga veritatis aperiam molestiae amet, rerum nisi suscipit repellendus corrupti magnam repellat molestias in praesentium laudantium quis, dignissimos delectus officia consectetur quisquam commodi? Iure tempore dolor incidunt quod! Facere provident beatae enim exercitationem doloribus placeat.</p><p>Voluptatem quos earum ipsam provident neque suscipit eveniet perferendis expedita repellendus tempore beatae illo ipsa id optio, ea eius impedit! Ipsum, quos? Quam ratione, incidunt quas dolorem quibusdam blanditiis ut optio aut numquam odit dolorum? Culpa neque quasi recusandae deserunt nisi commodi facilis aliquam, libero molestias dignissimos doloremque blanditiis natus soluta.</p>',
//            'category_id' => 2,
//            'user_id' => 2,
//        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
