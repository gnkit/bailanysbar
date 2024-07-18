<?php

namespace Database\Seeders;

use Domain\Link\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Бизнес',
            'name_en' => 'Business',
            'name_ru' => 'Бизнес',
            'slug' => Str::slug('Бизнес'),
            'icon' => 'fa-solid fa-money-bill',
            'parent_id' => null,
            'color' => '#3369e7',
        ]);
        Category::create([
            'name' => 'Құрылыс және жөндеу',
            'name_en' => 'Construction and repair',
            'name_ru' => 'Строительство и ремонт',
            'slug' => Str::slug('Құрылыс және жөндеу'),
            'icon' => 'fa-solid fa-screwdriver-wrench',
            'parent_id' => null,
            'color' => '#ffc168',
        ]);
        Category::create([
            'name' => 'Қызмет',
            'name_en' => 'Services',
            'name_ru' => 'Услуги',
            'slug' => Str::slug('Қызмет'),
            'icon' => 'fa-solid fa-thumbs-up',
            'parent_id' => null,
            'color' => '#003666',
        ]);
        Category::create([
            'name' => 'Киім және сән',
            'name_en' => 'Clothes and fashion',
            'name_ru' => 'Одежда и мода',
            'slug' => Str::slug('Киім және сән'),
            'icon' => 'fa-solid fa-shirt',
            'parent_id' => null,
            'color' => '#ff4f81',
        ]);
        Category::create([
            'name' => 'Спорт және фитнес',
            'name_en' => 'Sports and fitness',
            'name_ru' => 'Спорт и фитнес',
            'slug' => Str::slug('Спорт және фитнес'),
            'icon' => 'fa-solid fa-futbol',
            'parent_id' => null,
            'color' => '#2dde98',
        ]);
        Category::create([
            'name' => 'Ғылым және білім',
            'name_en' => 'Science and education',
            'name_ru' => 'Наука и образование',
            'slug' => Str::slug('Ғылым және білім'),
            'icon' => 'fa-solid fa-graduation-cap',
            'parent_id' => null,
            'color' => '#ecb731',
        ]);
        Category::create([
            'name' => 'Авто',
            'name_en' => 'Auto',
            'name_ru' => 'Авто',
            'slug' => Str::slug('Авто'),
            'icon' => 'fa-solid fa-car-side',
            'parent_id' => null,
            'color' => '#537b35',
        ]);
        Category::create([
            'name' => 'Медицина және фармацевтика',
            'name_en' => 'Medicine and pharmaceuticals',
            'name_ru' => 'Медицина и фармацевтика',
            'slug' => Str::slug('Медицина және фармацевтика'),
            'icon' => 'fa-solid fa-prescription-bottle-medical',
            'parent_id' => null,
            'color' => '#0085ad',
        ]);
        Category::create([
            'name' => 'Өндіру және жабдықтау',
            'name_en' => 'Production and supplies',
            'name_ru' => 'Производство и поставки',
            'slug' => Str::slug('Өндіру және жабдықтау'),
            'icon' => 'fa-solid fa-truck',
            'parent_id' => null,
            'color' => '#005670',
        ]);
        Category::create([
            'name' => 'Дүкендер',
            'name_en' => 'Stores',
            'name_ru' => 'Магазины',
            'slug' => Str::slug('Дүкендер'),
            'icon' => 'fa-solid fa-basket-shopping',
            'parent_id' => null,
            'color' => '#009f4d',
        ]);
        Category::create([
            'name' => 'Азық-түлік және сусын',
            'name_en' => 'Food and drink',
            'name_ru' => 'Еда и напитки',
            'slug' => Str::slug('Азық-түлік және сусын'),
            'icon' => 'fa-solid fa-utensils',
            'parent_id' => null,
            'color' => '#84bd00',
        ]);
        Category::create([
            'name' => 'Сұлулық және денсаулық',
            'name_en' => 'Beauty and health',
            'name_ru' => 'Красота и здоровье',
            'slug' => Str::slug('Сұлулық және денсаулық'),
            'icon' => 'fa-solid fa-scissors',
            'parent_id' => null,
            'color' => '#e4002b',
        ]);
        Category::create([
            'name' => 'Компьютер және интернет',
            'name_en' => 'Computers and internet',
            'name_ru' => 'Компьютеры и интернет',
            'slug' => Str::slug('Компьютер және интернет'),
            'icon' => 'fa-solid fa-computer',
            'parent_id' => null,
            'color' => '#008eaa',
        ]);
        Category::create([
            'name' => 'Туризм',
            'name_en' => 'Tourism',
            'name_ru' => 'Туризм',
            'slug' => Str::slug('Туризм'),
            'icon' => 'fa-solid fa-plane',
            'parent_id' => null,
            'color' => '#146eb4',
        ]);
        Category::create([
            'name' => 'Үй және интерьер',
            'name_en' => 'Home and interior',
            'name_ru' => 'Дом и интерьер',
            'slug' => Str::slug('Үй және интерьер'),
            'icon' => 'fa-solid fa-house',
            'parent_id' => null,
            'color' => '#eb5424',
        ]);
        Category::create([
            'name' => 'Демалыс және ойын-сауық',
            'name_en' => 'Recreation and entertainment',
            'name_ru' => 'Отдых и развлечения',
            'slug' => Str::slug('Демалыс және ойын-сауық'),
            'icon' => 'fa-solid fa-gamepad',
            'parent_id' => null,
            'color' => '#ed1c16',
        ]);
        Category::create([
            'name' => 'Қаржы',
            'name_en' => 'Finance',
            'name_ru' => 'Финансы',
            'slug' => Str::slug('Қаржы'),
            'icon' => 'fa-solid fa-chart-line',
            'parent_id' => null,
            'color' => '#6561ac',
        ]);
        Category::create([
            'name' => 'Мемлекет',
            'name_en' => 'Government',
            'name_ru' => 'Государство',
            'slug' => Str::slug('Мемлекет'),
            'icon' => 'fa-solid fa-building-columns',
            'parent_id' => null,
            'color' => '#464646',
        ]);
        Category::create([
            'name' => 'Көлік және тасымалдау',
            'name_en' => 'Transport and shipping',
            'name_ru' => 'Транспорт и перевозки',
            'slug' => Str::slug('Көлік және тасымалдау'),
            'icon' => 'fa-solid fa-train',
            'parent_id' => null,
            'color' => '#969696',
        ]);
        Category::create([
            'name' => 'Жарнама және полиграфия',
            'name_en' => 'Advertising and printing',
            'name_ru' => 'Реклама и полиграфия',
            'slug' => Str::slug('Жарнама және полиграфия'),
            'icon' => 'fa-solid fa-book',
            'parent_id' => null,
            'color' => '#ffa500',
        ]);
        Category::create([
            'name' => 'Жылжымайтын мүлік',
            'name_en' => 'Real estate',
            'name_ru' => 'Недвижимость',
            'slug' => Str::slug('Жылжымайтын мүлік'),
            'icon' => 'fa-solid fa-building',
            'parent_id' => null,
            'color' => '#2292a7',
        ]);
        Category::create([
            'name' => 'Телекоммуникация және байланыс',
            'name_en' => 'Telecommunications and communications',
            'name_ru' => 'Телекоммуникации и связь',
            'slug' => Str::slug('Телекоммуникация және байланыс'),
            'icon' => 'fa-solid fa-wifi',
            'parent_id' => null,
            'color' => '#5482ab',
        ]);
        Category::create([
            'name' => 'Қоғам',
            'name_en' => 'Society',
            'name_ru' => 'Общество',
            'slug' => Str::slug('Қоғам'),
            'icon' => 'fa-solid fa-users',
            'parent_id' => null,
            'color' => '#dbc65d',
        ]);
        Category::create([
            'name' => 'Қауіпсіздік',
            'name_en' => 'Security',
            'name_ru' => 'Безопасность',
            'slug' => Str::slug('Қауіпсіздік'),
            'icon' => 'fa-solid fa-shield-halved',
            'parent_id' => null,
            'color' => '#005238',
        ]);
        Category::create([
            'name' => 'Мәдениет және өнер',
            'name_en' => 'Culture and art',
            'name_ru' => 'Культура и искусство',
            'slug' => Str::slug('Мәдениет және өнер'),
            'icon' => 'fa-solid fa-music',
            'parent_id' => null,
            'color' => '#ffcd00',
        ]);
        Category::create([
            'name' => 'Балалар тауары',
            'name_en' => 'Goods for kids',
            'name_ru' => 'Товары для детей',
            'slug' => Str::slug('Балалар тауары'),
            'icon' => 'fa-solid fa-child-reaching',
            'parent_id' => null,
            'color' => '#8ee000',
        ]);
        Category::create([
            'name' => 'Үй жануарлары',
            'name_en' => 'Pets',
            'name_ru' => 'Домашние животные',
            'slug' => Str::slug('Үй жануарлары'),
            'icon' => 'fa-solid fa-paw',
            'parent_id' => null,
            'color' => '#82b541',
        ]);
        Category::create([
            'name' => 'Бұқаралық ақпарат құралдары',
            'name_en' => 'Media',
            'name_ru' => 'Средства массовой информации',
            'slug' => Str::slug('Бұқаралық ақпарат құралдары'),
            'icon' => 'fa-solid fa-bullhorn',
            'parent_id' => null,
            'color' => '#39c2d7',
        ]);
        Category::create([
            'name' => 'Анықтама және ақпараттық жүйелер',
            'name_en' => 'Help and information systems',
            'name_ru' => 'Справочно-информационные системы',
            'slug' => Str::slug('Анықтама және ақпараттық жүйелер'),
            'icon' => 'fa-solid fa-tower-broadcast',
            'parent_id' => null,
            'color' => '#4d148c',
        ]);

    }
}
