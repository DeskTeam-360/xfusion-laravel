<?php

namespace App\Repository\View;

use App\Repository\View;
use Illuminate\Database\Eloquent\Builder;

class User extends \App\Models\User implements View
{
    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
//        config('app.wp_prefix', 'wp_').'capabilities')
        return empty($query) ? static::query()
            : static::query();
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
            ['label' => 'Name', 'sort' => 'name'],
            ['label' => 'Company'],
            ['label' => 'Role', 'sort' => 'role'],
            ['label' => 'Aksi'],
        ];
    }

    public static function tableData($data = null): array
    {

//        dd(config('app.wp_prefix', 'wp_'));
        $roles = $data->meta->where('meta_key', '=', config('app.wp_prefix', 'wp_') . 'capabilities');
        $role = '';
        foreach ($roles as $r) {
            $role = array_key_first(unserialize($r['meta_value']));
        }
        if ($role == "administrator") {
            return [];
        }
        $companies = $data->meta->where('meta_key', '=', 'company');
        $company = '-';
        $link=route('user.edit',$data->ID);
        $link2=route('user.show',$data->ID);
        foreach ($companies as $r) {
            $c = \App\Models\Company::find($r['meta_value']);
            if ($c != null) {

                $company = $c->title;
            } else {
                $company = 'Company has been delete';
            }
        }
        return [
            ['type' => 'string', 'data' => $data->ID],
            ['type' => 'raw_html', 'data' =>
                "<div>
$data->user_nicename <br>
<div style='font-size: 10px'>$data->email</div>
</div>"
            ],
            ['type' => 'string', 'data' => $company],
            ['type' => 'string', 'data' => $role],
            ['type' => 'raw_html', 'text-align' => 'center', 'data' => "
<div class='flex gap-1'>
<span><a href='$link' class='btn btn-primary'>Edit</a></span>
<span><a href='#' class='btn btn-error'>delete</a></span>
<span><a href='$link2' class='btn btn-secondary'>Reset Password</a></span>
</div>"],
        ];
    }
}
