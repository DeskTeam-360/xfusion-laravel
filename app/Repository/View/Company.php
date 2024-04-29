<?php

namespace App\Repository\View;

use App\Repository\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class Company extends \App\Models\Company implements View
{
    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        return empty($query) ? static::query() : static::query();
    }

    public static function tableView(): array
    {
        return [
            'searchable' => true,
        ];
    }

    public static function tableField(): array
    {
        return [
            ['label' => '#', 'sort' => 'id', 'width' => '7%'],
            ['label' => 'Company Name', 'sort' => 'title'],
            ['label' => 'Company Leader', 'sort' => 'user_id'],
            ['label' => 'Company Logo',],
            ['label' => 'Company Qrcode',],
            ['label' => 'Action'],
        ];
    }

    public static function tableData($data = null): array
    {
        $logo_url = Storage::url($data->logo_url);
        $qrcode_url = Storage::url($data->logo_url);
        $link = route('company.edit',$data->id);
        return [
            ['type' => 'string','data'=>$data->id],
            ['type' => 'string', 'data' => $data->title],
            ['type' => 'string', 'data' =>  \App\Models\User::find($data->user_id)->user_nicename],
            ['type' => 'raw_html', 'data' => "<img style='max-width: 100px' src='$logo_url'>"],
            ['type' => 'raw_html', 'data' => "<img style='max-width: 100px' src='$qrcode_url'>"],
            ['type' => 'raw_html', 'data' => "<button class='btn btn-error'>delete</button>
<a href='$link' class='btn btn-error'>Edit</a>
"],
        ];
    }
}
