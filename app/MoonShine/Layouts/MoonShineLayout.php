<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\Palettes\RetroPalette;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Contracts\ColorManager\PaletteContract;
use App\MoonShine\Resources\Categories\CategoriesResource;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\Products\ProductsResource;
use App\MoonShine\Resources\Clients\ClientsResource;
use App\MoonShine\Resources\Orders\OrdersResource;
use App\MoonShine\Resources\Bills\BillsResource;

final class MoonShineLayout extends AppLayout
{
    /**
     * @var null|class-string<PaletteContract>
     */
    protected ?string $palette = RetroPalette::class;

    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            ...parent::menu(),
            MenuItem::make(CategoriesResource::class, 'Categories'),
            MenuItem::make(ProductsResource::class, 'Products'),
            MenuItem::make(ClientsResource::class, 'Clients'),
            MenuItem::make(OrdersResource::class, 'Orders'),
            MenuItem::make(BillsResource::class, 'Bills'),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }
}
