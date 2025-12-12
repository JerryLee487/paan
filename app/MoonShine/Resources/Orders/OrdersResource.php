<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Orders;

use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;
use App\MoonShine\Resources\Orders\Pages\OrdersIndexPage;
use App\MoonShine\Resources\Orders\Pages\OrdersFormPage;
use App\MoonShine\Resources\Orders\Pages\OrdersDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Orders, OrdersIndexPage, OrdersFormPage, OrdersDetailPage>
 */
class OrdersResource extends ModelResource
{
    protected string $model = Orders::class;

    protected string $title = 'Orders';
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            OrdersIndexPage::class,
            OrdersFormPage::class,
            OrdersDetailPage::class,
        ];
    }
}
