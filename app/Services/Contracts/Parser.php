<?php


namespace App\Services\Contracts;


interface Parser
{
    /**
     * @param string $data
     * @return Parser
     */
    public function setLink(string $data): self;

    /**
     * @return array
     */
    public function getParseData(): array;
}
