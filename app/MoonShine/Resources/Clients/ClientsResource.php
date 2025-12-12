<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Clients;

use Illuminate\Database\Eloquent\Model;
use App\Models\Clients;
use App\MoonShine\Resources\Clients\Pages\ClientsIndexPage;
use App\MoonShine\Resources\Clients\Pages\ClientsFormPage;
use App\MoonShine\Resources\Clients\Pages\ClientsDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Clients, ClientsIndexPage, ClientsFormPage, ClientsDetailPage>
 */
class ClientsResource extends ModelResource
{
    protected string $model = Clients::class;

    protected string $title = 'Clients';
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            ClientsIndexPage::class,
            ClientsFormPage::class,
            ClientsDetailPage::class,
        ];
    }
}
