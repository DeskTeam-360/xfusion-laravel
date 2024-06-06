<form wire:submit="{{ $action }}">
    <x-input title="Page title" model="pageTitle" required="true"/>
    <x-input title="Course title" model="courseTitle" required="true"/>
    <x-input title="Url" model="url" required="true"/>
    {{--    <x-input title="Redirect Link" model="redirect_url" required="true"/>--}}
    <input type="submit" class="btn" value="Save Company">
</form>
