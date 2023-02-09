<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('source')->insert($this->getSourceData());
    }

    public function getSourceData(): array
    {
        $sourceData = [];
        $sourceCollection = [
            ['Yandex', 'https://dzen.ru/'],
            ['Youtube', 'https://www.youtube.com/'],
            ['Vk', 'https://vk.ru/'],
            ['google', 'https://www.google.com/'],
            ['Habr', 'https://habr.com/'],
        ];

        for ($i = 0; $i < 10; $i++) {
            $index = array_rand($sourceCollection);

            $sourceData[] = [
                'name' => $sourceCollection[$index][0],
                'url' => $sourceCollection[$index][1],
                'created_at' => \now(),
                'updated_at' => \now(),
            ];
        }

        return $sourceCollection;
    }
}
