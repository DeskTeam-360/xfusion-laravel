<?php

namespace App\Repository\View;

use App\Repository\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class WpGfEntry extends \App\Models\WpGfEntry implements View
{
    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        $params = $params['param1'];
//        if ($params == null) {
        return empty($query) ? static::query()
            : static::query()
                ->whereHas('user', function ($q2) use ($query) {
                    $q2->where('user_nicename', 'like', "%$query%");
                })
                ->orWhereHas('wpGfForm', function ($q2) use ($query) {
                    $q2->where('title', 'like', "%$query%")->whereIn('id', [2, 3, 4, 7, 8, 9, 10, 13, 11, 14, 15, 16, 17, 18, 19]);
                });
//        } else {
//            return empty($query) ? static::query()
//                ->orWhereHas('companyEmployee', function ($q) use ($params) {
//                    $q->where('company_id', '=', $params);
//                })
//                ->where('user_nicename', 'like', "%$query%") :
//                static::query()
//                    ->whereHas('companyEmployee', function ($q) use ($params) {
//                        $q->where('company_id', '=', $params);
//                    })
//                    ->orWhere('user_nicename', 'like', "%$query%");
//        }

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
            ['label' => 'Attempt', 'sort'=>'date_created'],
            ['label' => 'Page title'],
            ['label' => 'Name',],
            ['label' => 'Company'],
            ['label' => 'Action'],
        ];
    }

    public static function tableData($data = null): array
    {
        $roles = Auth::user()->meta->where('meta_key', '=', config('app.wp_prefix', 'wp_') . 'capabilities');
        $roleUser = '';

        foreach ($roles as $r) {
            $roleUser = array_key_first(unserialize($r['meta_value']));
        }



//        $roles = $data->user->meta->where('meta_key', '=', config('app.wp_prefix', 'wp_') . 'capabilities');
//        $role = '';

//        foreach ($roles as $r) {
//            $role = array_key_first(unserialize($r['meta_value']));
//        }


//        $companies = $data->user->meta->where('meta_key', '=', 'company');
//        $company = '-';


//        $link = route('user.edit', $data->ID);
//        $link2 = route('user.show', $data->ID);


//        $companyId = null;
//        foreach ($companies as $r) {
//            $c = \App\Models\Company::find($r['meta_value']);
//            if ($c != null) {
//                $companyId = $c->id;
//                $company = $c->title;
//            } else {
//                $company = 'Company has been delete';
//            }
//        }

//
//        if ($roleUser == "administrator") {
//            $link = route('user.edit', $data->ID);
//            $link3 = route('schedule-user-administrator', [$data->ID]);
//        } else {
//            $link = route('company.edit-employee', [$companyId, $data->ID]);
//            $link3 = route('company.schedule-user', [$companyId, $data->ID]);
//        }

        return [
            ['type' => 'string', 'data' => $data->date_created],
            ['type' => 'raw_html', 'data' =>
                "<div>$data->user->user_login <br><div style='font-size: 10px'>$data->user->email</div></div>"
            ],
//            ['type' => 'string', 'data' => $company],
//            ['type' => 'string', 'data' => $role],
            ['type' => 'raw_html', 'text-align' => 'center', 'data' => ""],
        ];
    }
}