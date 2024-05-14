<?php

namespace App\Repository\View;

use App\Repository\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class LimitLink extends \App\Models\LimitLinkWithTime implements View
{
    protected $table='limit_link_with_times';

    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        return empty($query) ? static::query() : static::query();
    }

    public static function tableView(): array
    {
        return [
            'searchable' => false,
        ];
    }

    public static function tableField(): array
    {
        return [
            ['label' => '#', 'sort' => 'id', 'width' => '7%'],
            ['label' => 'Link', 'sort' => 'link'],
            ['label' => 'Redirect link', 'sort' => 'redirec_url'],
            ['label' => 'Action'],
        ];
    }

    public static function tableData($data = null): array
    {
        return [
            ['type' => 'string','data'=>$data->id],
            ['type' => 'string', 'data' => $data->url],
            ['type' => 'string', 'data' => $data->redirect_url],
            ['type' => 'raw_html','text-align'=>'center', 'data' => "
<div class='flex gap-1'>

<span><button href='#' wire:click='deleteItem($data->id)' class='btn btn-error'>delete</button></span>
</div>"],

        ];
    }
}
