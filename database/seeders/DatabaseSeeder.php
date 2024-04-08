<?php

namespace Database\Seeders;
use App\Models\Rak;
use App\Models\User;
use App\Models\Profile;
use App\Models\Book;
use App\Models\Denda;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Book::create([
            'book_code' => 'SMK1/0248/SEBATIKBARAT',
            'isbn'      => '650089245',
            'title'     => 'Struktur Pada Laravel',
            'description'     => 'Buku ini berisikan materi pemrograman web di dalam laravel ',
            'book_location' => 'Rak 1',
            'book_category' => 'Novel',
            'author' => 'Apras',
            'publisher' => 'Erlangga',
            'year' => '2023',
            'amount' => '12',
            'image' => ''
        ]);
        Book::create([
            'book_code' => 'SMK1/0249/SEBATIKBARAT',
            'isbn'      => '650089246',
            'title'     => 'Sistem Pakar',
            'description'     => 'Buku ini berisikan materi pemrograman web dengan sistem kepakaran ',
            'book_location' => 'Rak 1',
            'book_category' => 'Novel',
            'author' => 'Apras',
            'publisher' => 'Erlangga',
            'year' => '2023',
            'amount' => '12',
            'image' => ''
        ]);
        Book::create([
            'book_code' => 'SMK1/0250/SEBATIKBARAT',
            'isbn'      => '650089247',
            'title'     => 'Belum Siap Botak',
            'description'     => 'bayangkan aja dulu walai makan ',
            'book_location' => 'Rak 1',
            'book_category' => 'Novel',
            'author' => 'Apras',
            'publisher' => 'Erlangga',
            'year' => '2023',
            'amount' => '12',
            'image' => ''
        ]);
        Book::create([
            'book_code' => 'SMK1/0251/SEBATIKBARAT',
            'isbn'      => '650089248',
            'title'     => 'Yuk Bisa Cumlaude Agustus',
            'description'     => 'bayangkan aja dulu walau terlihat susah ',
            'book_location' => 'Rak 1',
            'book_category' => 'Novel',
            'author' => 'Apras',
            'publisher' => 'Erlangga',
            'year' => '2023',
            'amount' => '12',
            'image' => ''
        ]);


        Rak::create([
            'name_rak' => 'Rak 1',
        ]);
        Rak::create([
            'name_rak' => 'Rak 2',
        ]);
        Rak::create([
            'name_rak' => 'Rak 3',
        ]);
        Rak::create([
            'name_rak' => 'Rak 4',
        ]);
        Rak::create([
            'name_rak' => 'Rak 5',
        ]);
        Rak::create([
            'name_rak' => 'Rak 6',
        ]);

        Penerbit::create([
            'name_publisher' => 'Penerbit Deepublish',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Bukunesia',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Gramedia Pustaka Utama',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Grasindo',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Inari',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Bintang Media',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Kata Depan',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Falcon Publishing',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Gradien Mediatama',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Twigora',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Haru',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Media Kita',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Bentang Pustaka',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit PlotPoint',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Republika',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Erlangga',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Elex Media Komputindo',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit Ikon',
        ]);
        Penerbit::create([
            'name_publisher' => 'Penerbit  Pro-U Media',
        ]);

        Kategori::create([
            'categori_name' => 'Novel'

        ]);
        Kategori::create([
            'categori_name' => 'Majalah'

        ]);
        Kategori::create([
            'categori_name' => 'Kamus'

        ]);
        Kategori::create([
            'categori_name' => 'Komik'

        ]);
        Kategori::create([
            'categori_name' => 'Pelajaran'

        ]);
        Kategori::create([
            'categori_name' => 'Ensiklopedia'

        ]);
        Kategori::create([
            'categori_name' => 'Biografi'

        ]);
        Kategori::create([
            'categori_name' => 'Naskah'

        ]);
        Kategori::create([
            'categori_name' => 'Ligth novel'

        ]);


        Denda::create(
            [
                'charge' => '500'
            ]
            );
        User::create(
            [
                'nis'       => '18310135',
                'name'      => 'Nukbatun Nisa',
                'password'  =>  Hash::make('user123'),
                'role'      => 'USER'
            ]
            );
        User::create(
            [
                'nis'       => '19330017',
                'name'      => 'Reza Abdy Prasetyo',
                'password'  =>  Hash::make('user123'),
                'role'      => 'USER'
            ]
            );
        User::create(
            [
                'nis'       => '121',
                'name'      => 'tester',
                'password'  =>  Hash::make('admin123'),
                'role'      => 'ADMIN'
            ]
            );


     Profile::create([
        'major'         =>'Teknik Sipil',
        'street'        =>'Jl. Bumiijo',
        'phone_number'  =>'082241569190',
        'image'         =>   '',
        'users_id'      =>'1',
        ]);

     Profile::create([
        'major'         =>'Teknik Informatika',
        'street'        =>'Jl. Bumiijo',
        'phone_number'  =>'082241569190',
        'image'         =>   '',
        'users_id'      =>'2',
        ]);
     Profile::create([
        'major'         =>'Teknik Tata Boga Informatika',
        'street'        =>'Jl. Bumiijo',
        'phone_number'  =>'082241569190',
        'image'         => '',
        'users_id'      =>'3',
        ]);
    }
}
