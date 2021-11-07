<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\HasBlocks;
use App\Traits\HasLayout;
use App\Traits\HasMedia;
use App\Traits\HasSlug;
use App\Traits\Publishable;
use App\Traits\Sortable;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use Filterable;
    use HasBlocks;
    use HasFactory;
    use HasLayout;
    use HasMedia;
    use HasSlug;
    use Publishable;
    use SoftDeletes;
    use Sortable;
    use Translatable;

    public string $slugFieldSource = 'title';

    public array $translatable = [
        'title', 'slug',
    ];

    public array $allowedSorts = [
        'title',
    ];

    public array $allowedFilters = [
        //
    ];
}
