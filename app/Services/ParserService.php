<?php


namespace App\Services;


use App\Services\Contracts\Parser;

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
     * @return array
     */
    public function getParseData(): array
    {
        $xml = XMLParser::load($this->link);

        return $xml->parse([
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
                'users' => 'channel.item[title, link, guid, description, pubDate]'
            ],
        ]);
    }
}
