<?php


namespace App\Services;


use App\Models\News;
use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;

    /**
     * @param string $data
     * @return self
     */
    public function setLink(string $data): self
    {
        $this->link = $data;
        return $this;
    }

    /**
     * @return void
     */
    public function saveParseData(): void
    {
        $xml = XMLParser::load($this->link);

        $data = $xml->parse([
            'title' => [
                'users' => 'channel.title',
            ],
            'link' => [
                'users' => 'channel.link',
            ],
            'description' => [
                'users' => 'channel.description',
            ],
            'image' => [
                'users' => 'channel.image.url',
            ],
            'news' => [
                'users' => 'channel.item[title, link, author, description, pubDate]'
            ],
        ]);

        foreach ($data["news"] as $news) {
            News::create([
                'title' => $news['title'],
                'link' => $news['link'],
                'description' => $news['description'],
                'author' => $news['author'],
            ]);
        }
    }
}
