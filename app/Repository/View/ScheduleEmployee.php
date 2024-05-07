<?php

namespace App\Repository\View;

use App\Repository\View;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ScheduleEmployee extends \App\Models\CompanyEmployee implements View
{
    protected $table = 'schedule_executions';
//schedule_executions
    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        $param = $params['param1'];
//        dd(static::query()->where('company_id','=',$param));
        return empty($query) ?
            static::query()->where('company_id', '=', $param) :
            static::query()->where('company_id', '=', $param);
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
            ['label' => 'Title', 'text-align' => 'center'],
            ['label' => 'Link', 'text-align' => 'center'],
            ['label' => 'Can Access', 'text-align' => 'center'],
            ['label' => 'Last Access', 'text-align' => 'center'],
        ];
    }

    public static function tableData($data = null): array
    {
        $query = [
            'user_id'=>$data->user_id,
            'schedule_access' => $data->schedule_access,
            'company_id'=>$data->company_id,
            'logo_url'=>\App\Models\Company::find($data->company_id)->logo_url,
            'qrcode_url'=>\App\Models\Company::find($data->company_id)->qrcode_url,
        ];

        $link = $data->link."/?query=".base64_encode(json_encode($query));
        $now = Carbon::now();
//        $link2 = route('company.show',$data->id);
        return [
            ['type' => 'index', 'data' => $data->id],
            ['type' => 'string', 'data' => \App\Models\User::find($data->user_id)->user_nicename],
            ['type' => 'string', 'text-align' => 'center', 'data' => $data->title],
            ['type' => 'raw_html', 'text-align' => 'center', 'data' => "<a href='$link' target='_blank' class='btn btn-primary'>Click Here</a>"],
            ['type' => 'raw_html', 'text-align' => 'center', 'data' => "<a href=''>$data->schedule_access</a>"],
            ['type' => 'raw_html', 'text-align' => 'center', 'data' => "<a href=''>$data->schedule_deadline</a>"],
        ];
    }
}
