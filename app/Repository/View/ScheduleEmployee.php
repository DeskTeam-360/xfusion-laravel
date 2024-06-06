<?php

namespace App\Repository\View;

use App\Models\ScheduleExecution;
use App\Repository\View;
use Illuminate\Database\Eloquent\Builder;

class ScheduleEmployee extends ScheduleExecution implements View
{
    protected $table = 'schedule_executions';

//schedule_executions
    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        $param = $params['param1'];

        return empty($query) ?
            static::query()->where('company_id', '=', $param) :
            static::query()->where('company_id', '=', $param)->where(function ($q) use ($query) {
                $q->whereHas('user', function ($q) use ($query) {
                    $q->where('user_nicename', 'like', "%$query%");
                })
                    ->orWhere('schedule_access', 'like', "%$query%")
                    ->orWhere('schedule_deadline', 'like', "%$query%");
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
            ['label' => 'Title', 'text-align' => 'center'],
            ['label' => 'Link', 'text-align' => 'center'],
            ['label' => 'Start accessible', 'text-align' => 'center'],
            ['label' => 'Accessible until', 'text-align' => 'center'],
        ];
    }

    public static function tableData($data = null): array
    {
        $link = $data->link;
        return [
            ['type' => 'index', 'data' => $data->id],
            ['type' => 'string', 'data' => \App\Models\User::find($data->user_id)->user_nicename],
            ['type' => 'string', 'text-align' => 'center', 'data' => $data->title],
            ['type' => 'raw_html', 'text-align' => 'center', 'data' => "
<script >
function myFunction() {
    navigator.clipboard.writeText('$link');
}
</script>
<button onclick='myFunction()'   class='btn btn-primary text-nowrap'>Copy Link</button>"],
            ['type' => 'raw_html', 'text-align' => 'center', 'data' => $data->schedule_access],
            ['type' => 'raw_html', 'text-align' => 'center', 'data' => $data->schedule_deadline],
        ];
    }
}
