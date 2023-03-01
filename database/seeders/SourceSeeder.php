<?php

namespace Database\Seeders;

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
            ['moscow', 'https://news.rambler.ru/rss/moscow_city'],
            ['technology', 'https://news.rambler.ru/rss/technology'],
            ['starlife', 'https://news.rambler.ru/rss/starlife/'],
            ['politics', 'https://news.rambler.ru/rss/politics'],
            ['world', 'https://news.rambler.ru/rss/world'],
            ['tech', 'https://news.rambler.ru/rss/tech'],
        ];

        for ($i = 0; $i < 10; $i++) {
            $index = array_rand($sourceCollection);

            $sourceData[] = [
                'name' => $sourceCollection[$index][0],
                'url' => $sourceCollection[$index][1],
                'category' => 'news',
                'created_at' => \now(),
                'updated_at' => \now(),
            ];
        }

        return $sourceCollection;
    }
}
