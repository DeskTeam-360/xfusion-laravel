<div>
    @foreach($entries as $entry)
        {{ \App\Models\User::find($entry->created_by)->user_nicename }}
    @endforeach
</div>
