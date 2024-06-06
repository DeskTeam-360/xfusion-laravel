<?php

namespace App\Repository\View;

use App\Repository\View;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ScheduleEmployeeAll extends \App\Models\CompanyEmployee implements View
{
    protected $table = 'schedule_executions';

//schedule_executions
    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];

        return empty($query) ?
            static::query() :
            static::query()->whereHas('user', function ($q) use ($query) {
                $q->where('user_nicename', 'like', "%$query%");
            })->orWhere('schedule_access', 'like', "%$query%")
                ->orWhere('schedule_deadline', 'like', "%$query%");
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
            ['label' => 'Company Name', 'sort' => 'user_id'],
            ['label' => 'Employee Name', 'sort' => 'user_id'],
            ['label' => 'Title', 'text-align' => 'center'],
            ['label' => 'Link', 'text-align' => 'center'],
            ['label' => 'Start accessible', 'text-align' => 'center'],
            ['label' => 'Accessible until', 'text-align' => 'center'],
        ];
    }

    public static function tableData($data = null): array
    {
        $query = [
            'user_id' => $data->user_id,
            'schedule_access' => $data->schedule_access,
            'company_id' => $data->company_id,
            'logo_url' => \App\Models\Company::find($data->company_id)->logo_url ?? '',
            'qrcode_url' => \App\Models\Company::find($data->company_id)->qrcode_url ?? '',
        ];

        $link = $data->link . "/?query=" . base64_encode(json_encode($query));
        $now = Carbon::now();
//        $link2 = route('company.show',$data->id);
        return [
            ['type' => 'index', 'data' => $data->id],
            ['type' => 'string', 'data' => \App\Models\Company::find($data->company_id)->title??''],
            ['type' => 'string', 'data' => \App\Models\User::find($data->user_id)->user_nicename ?? ''],
            ['type' => 'string', 'text-align' => 'center', 'data' => $data->title],
            ['type' => 'raw_html', 'text-align' => 'center', 'data' => "
                <script >
function myFunction() {
    navigator.clipboard.writeText('$link');
}
</script>
<button onclick='myFunction()'   class='btn btn-primary text-nowrap'>Copy Link</button>"],
            ['type' => 'string', 'text-align' => 'center', 'data' => "$data->schedule_access"],
            ['type' => 'string', 'text-align' => 'center', 'data' => "$data->schedule_deadline"],
        ];
    }
}
