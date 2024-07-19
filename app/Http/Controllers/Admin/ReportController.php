<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\WpGfEntry;
use App\Models\WpGfForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WpGfFormMeta;
use App\Models\WpGfEntryMeta;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view(
            'admin.report.index'
        );
    }

    public function seasonCourseEmployee($id)
    {
        $data = WpGfEntry::select('id', 'created_by', 'date_created')
                    ->where('form_id', $id)
                    ->whereNotNull('created_by')
                    ->whereIn(DB::raw('(created_by, date_created)'), function($query) use ($id) {
                        $query->select(DB::raw('created_by, MAX(date_created)'))
                              ->from('wp_gf_entry')
                              ->where('form_id', $id)
                              ->whereNotNull('created_by')
                              ->groupBy('created_by');
                    })
                    ->get();
//        dd($data);

        $formId = $id;

        return view(
            'admin.report.season-course-employee', compact('data', 'formId')
        );
    }

    public function seasonCourseIndex()
    {
        $data_form = WpGfForm::all();

        return view(
            'admin.report.season-course-index', compact('data_form')
        );
    }

    public function seasonEmployeeDetail($formId, $entryId, $dateCreated)
    {
        $data = WpGfFormMeta::where('form_id', $formId)->first();
//        dd($data);
        $data_entry = WpGfEntryMeta::where('form_id', $formId)->where('entry_id', $entryId)->get();
//        dd($data, $data_entry);
//        foreach ($data_entry as $entry) {
//
//            dd($entry->wpGfEntry);
//            if ($entry->wpGfEntry['date_created'] == $dateCreated) {
//                dd($entry);
//            }
//
//
//        }

        $lms = $data->wpGfForm->title;
        $count_fields = 0;
        $count_entry = 0;
        $array_entry = [];

        // dd($data_entry[0]->getAttributes()['meta_value']);

        foreach($data->getFields()->fields as $field){
//             dd($field);
            $count_fields += 1;
            $array_entry[$field->id] = null;
        }

        foreach ($data_entry as $entry){
//            dd($entry['meta_value']);
            $array_entry[$entry->meta_key] = $entry['meta_value'];
        }

//        dd($array_entry);

        $data_fields = $data->getFields()->fields;

        // dd($count_fields);
        return view('admin.report.season-employee-detail', compact('data_fields', 'lms', 'count_fields', 'array_entry','entryId'));
    }
}
