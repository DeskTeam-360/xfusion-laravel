<x-admin-layout>
    <div class="container full-container py-5">
        <div class="w-full">

            <h1 class="text-3xl font-bold text-center text-blue-600">Report Course</h1>

            <div class="customizer-box label btn" style="margin-top: 40px;">REVITALIZE</div>
            <div class="customizer-box label btn"
                style="margin-bottom: 30px; background-color: white; border-color:black; color:black;">
                SEASON 1</div>
            @php
                $temp_loop = 0;
            @endphp
            @foreach($data_form as $df)
                @if($temp_loop == 0)
                    <div class="flex gap-8">
                @endif

                    <div class="card mb-4"> <!-- Added mb-4 for bottom margin -->
                        <div class="card-body">
                            <div class="card-title">
                                <a href="{{ route('season-course-employee', $df['id']) }}">{{ $df['title'] }}</a>
                            </div>
                        </div>
                    </div>
                        @php
                            $temp_loop += 1;
                        @endphp
                @if($temp_loop == 2)
                    </div>
                    @php
                        $temp_loop = 0;
                    @endphp
                @endif
            @endforeach


        </div>
    </div>
</x-admin-layout>
