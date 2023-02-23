<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Parser  $parser
     * @return Parser
     */
    public function __invoke(Request $request, Parser $parser): Parser
    {
        $load = $parser->setLink('https://news.yandex.ru/music.rss');
        return $load;
    }
}
