<?php

namespace App\Services;

class CategoryService
{
    const PUBLICATION_ASC_FLAG = 'active_publication_asc';
    const PUBLICATION_DESC_FLAG = 'active_publication_desc';
    const VIEWS_DESC_FLAG = 'active_views_desc';
    const VIEWS_ASC_FLAG = 'active_views_asc';

    public function getFiltration(string $orderBy, string $dir): string
    {
        if ($orderBy === 'publication_date' && $dir === 'asc') {
            return self::PUBLICATION_ASC_FLAG;
        } else if ($orderBy === 'count_views' && $dir === 'desc') {
            return self::VIEWS_DESC_FLAG;
        } else if ($orderBy === 'count_views' && $dir === 'asc') {
            return self::VIEWS_ASC_FLAG;
        } else {
            return self::PUBLICATION_DESC_FLAG;
        }
    }
}