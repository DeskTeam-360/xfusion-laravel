<x-admin-layout>
    <div class="container full-container py-5">
        <div class="w-full">

            <h1 class="text-3xl font-bold text-center text-blue-600">Report Course</h1>

            <div class="customizer-box label btn" style="margin-top: 40px;">REVITALIZE</div>
            <div class="customizer-box label btn"
                style="margin-bottom: 30px; background-color: white; border-color:black; color:black;">
                SEASON {{ $id }}</div>

            <div class="overflow-x-auto">
                <table class="w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-3 text-left">
                                <div class="flex items-center">
                                    <i class="fas fa-user mr-1 text-gray-500"></i>
                                    Name
                                </div>
                            </th>
                            <th class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-birthday-cake mr-1 text-gray-500"></i>
                                    Completed course status
                                </div>
                            </th>
                            <th class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-gray-500"></i>
                                    Date start course
                                </div>
                            </th>
                            <th class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-user-tag mr-1 text-gray-500"></i>
                                    Options
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($data as $d)

{{--                        @php dd($d) @endphp--}}
                        <tr class="border-b">
                            <td class="border px-4 py-4">{{ \App\Models\User::where('id', $d)->first()['user_login'] }}</td>
                            <td class="border px-4 py-4 text-center">{{ \App\Models\ScheduleExecution::where('user_id', $d)->count() >= \App\Models\CourseGroup::where('season_id', $d)->count() ? 'Done' : 'On Progress' }}</td>
                            @php $date = \App\Models\ScheduleExecution::where('user_id', $d)->first()['schedule_access']; @endphp
                            <td class="border px-4 py-4 text-center">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('M d, Y') }}</td>
                            <td class="border px-4 py-4 text-center"><a
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    href="{{ route('season-course-index', [$id, $d]) }}">Detail</a></td>
{{--                            <td class="border px-4 py-4 text-center"><a--}}
{{--                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"--}}
{{--                                    href="{{ route('season-employee-detail', ['entryId' => $d->id, 'dateCreated'=> $d->date_created]) }}">Detail</a></td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-admin-layout>
