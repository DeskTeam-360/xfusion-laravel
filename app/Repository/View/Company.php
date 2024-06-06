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
        return empty($query) ? static::query() : static::query()->where('title', 'like', "%$query%");
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
            ['label' => 'Company Logo', 'text-align'=>'center'],
            ['label' => 'Company Qrcode',],
            ['label' => 'Action'],
        ];
    }

    public static function tableData($data = null): array
    {
        $logo_url = Storage::url($data->logo_url);
        $qrcode_url = Storage::url($data->qrcode_url);
        $link = route('company.edit',$data->id);
        $link2 = route('company.show',$data->id);
        return [
            ['type' => 'string','data'=>$data->id],
            ['type' => 'string', 'data' => $data->title],
            ['type' => 'string', 'data' =>  \App\Models\User::find($data->user_id)->user_nicename],
            ['type' => 'raw_html','text-align'=>'center', 'data' => "<div class='text-center' style=' display: flex;justify-content: center;'><img style='width: 100px' src='$logo_url'></div>"],
            ['type' => 'raw_html','text-align'=>'center', 'data' => "<div class='text-center' style=' display: flex;justify-content: center;'><img style='width: 100px' src='$qrcode_url'></div>"],
            ['type' => 'raw_html','text-align'=>'center', 'data' => "
<div class='flex gap-1'>
<span><a href='$link' class='btn btn-primary'>Edit</a></span>
<span><a href='#' class='btn btn-error'>delete</a></span>
<span><a href='$link2' class='btn btn-secondary' style='overflow: hidden;white-space: nowrap;'>Show Employee</a></span>



</div>"],

        ];
    }
}
