<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Bills;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bills;
use App\MoonShine\Resources\Bills\Pages\BillsIndexPage;
use App\MoonShine\Resources\Bills\Pages\BillsFormPage;
use App\MoonShine\Resources\Bills\Pages\BillsDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Bills, BillsIndexPage, BillsFormPage, BillsDetailPage>
 */
class BillsResource extends ModelResource
{
    protected string $model = Bills::class;

    protected string $title = 'Bills';
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            BillsIndexPage::class,
            BillsFormPage::class,
            BillsDetailPage::class,
        ];
    }
}
