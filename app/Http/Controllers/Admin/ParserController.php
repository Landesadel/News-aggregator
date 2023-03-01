<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\QueryBuilders\SourceQueryBuilder;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Parser  $parser
     * @return Parser
     */
    public function __invoke(SourceQueryBuilder $sourceQueryBuilder, Request $request): string
    {
        $urls = $sourceQueryBuilder->getCollection()->pluck('url');
        foreach ($urls as $url) {
            \dispatch(new JobNewsParsing($url));
        }

        return 'Parsing completed';
    }
}
