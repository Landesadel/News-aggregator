<?php


namespace App\Enums;


class NewsStatusEnum
{
    public const DRAFT   = 'draft';
    public const ACTIVE  = 'active';
    public const BLOCKED = 'blocked';

    /**
     * @return array
     */
    public static function getCollectionStatus(): array
    {
        return [
            self::DRAFT,
            self::ACTIVE,
            self::BLOCKED,
        ];
    }
}
