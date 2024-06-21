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

        $link = $data->link;
        $now = Carbon::now();
//        $link2 = route('company.show',$data->id);
        return [
            ['type' => 'index', 'data' => $data->id],
            ['type' => 'string', 'data' => \App\Models\Company::find($data->company_id)->title??''],
            ['type' => 'string', 'data' => \App\Models\User::find($data->user_id)->user_nicename ?? ''],
            ['type' => 'string', 'text-align' => 'center', 'data' => $data->title],
            ['type' => 'raw_html', 'text-align' => 'center', 'data' => "
                <script >
function myFunction(link) {
    navigator.clipboard.writeText(link);
}
</script>
<button onclick='myFunction(`$link`)' wire:click='toastAlert(`success`,`Link has been copied`)'  class='btn btn-primary text-nowrap'>Copy Link</button>"],
            ['type' => 'string', 'text-align' => 'center', 'data' => $data->schedule_access??'Not schedule'],
            ['type' => 'string', 'text-align' => 'center', 'data' => $data->schedule_deadline??'Not schedule'],
        ];
    }
}
