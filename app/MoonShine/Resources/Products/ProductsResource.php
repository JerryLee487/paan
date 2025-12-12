<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Products;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\MoonShine\Resources\Products\Pages\ProductsIndexPage;
use App\MoonShine\Resources\Products\Pages\ProductsFormPage;
use App\MoonShine\Resources\Products\Pages\ProductsDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Products, ProductsIndexPage, ProductsFormPage, ProductsDetailPage>
 */
class ProductsResource extends ModelResource
{
    protected string $model = Products::class;

    protected string $title = 'Products';
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            ProductsIndexPage::class,
            ProductsFormPage::class,
            ProductsDetailPage::class,
        ];
    }
}
