<?php

namespace App\Repository\View;

use App\Repository\View;
use Illuminate\Database\Eloquent\Builder;

class CompanyEmployee extends \App\Models\CompanyEmployee implements View
{
    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        $param = $params['param1'];
//        dd(static::query()->where('company_id','=',$param));
        return empty($query) ?
            static::query()->where('company_id', '=', $param) :
            static::query()->where('company_id', '=', $param)
                ->whereHas('user', function ($q) use ($query) {
                $q->where('user_nicename', 'like', "%$query%");
            });
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
            ['label' => 'Employee Name', 'sort' => 'user_id'],
            ['label' => 'Revitalize season 1', 'text-align' => 'center'],
            ['label' => 'Revitalize season 2', 'text-align' => 'center'],
            ['label' => 'Revitalize season 3', 'text-align' => 'center'],
            ['label' => 'Revitalize season 4', 'text-align' => 'center'],
//            ['label' => 'Action'],
        ];
    }

    public static function tableData($data = null): array
    {
        $link = route('user.edit', $data->user_id);
//        $link2 = route('company.show',$data->id);
        return [
            ['type' => 'index', 'data' => $data->id],
            ['type' => 'string', 'data' => \App\Models\User::find($data->user_id)->user_nicename],
            ['type' => 'string', 'text-align' => 'center', 'data' => 'no activity'],
            ['type' => 'string', 'text-align' => 'center', 'data' => 'no activity'],
            ['type' => 'string', 'text-align' => 'center', 'data' => 'no activity'],
            ['type' => 'string', 'text-align' => 'center', 'data' => 'no activity'],
//            ['type' => 'raw_html', 'text-align' => 'center', 'data' => "
//<div class='flex gap-1 p-2'>
//<span><a href='$link' class='btn btn-primary'>Edit</a></span>
//</div>"],
        ];
    }
}
