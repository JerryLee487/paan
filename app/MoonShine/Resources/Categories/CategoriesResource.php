<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Categories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\MoonShine\Resources\Categories\Pages\CategoriesIndexPage;
use App\MoonShine\Resources\Categories\Pages\CategoriesFormPage;
use App\MoonShine\Resources\Categories\Pages\CategoriesDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Categories, CategoriesIndexPage, CategoriesFormPage, CategoriesDetailPage>
 */
class CategoriesResource extends ModelResource
{
    protected string $model = Categories::class;

    protected string $title = 'Categories';
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            CategoriesIndexPage::class,
            CategoriesFormPage::class,
            CategoriesDetailPage::class,
        ];
    }
}
