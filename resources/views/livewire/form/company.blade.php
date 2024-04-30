{{--<form wire:submit.prevent="create">--}}
{{--    <x-input title="Name company" model="title"/>--}}

{{--    <div class="">--}}
{{--        <label for="" class="form-label mb-2 text-black">--}}
{{--            Company Logo--}}
{{--            <span class="text-red-600">*</span>--}}
{{--        </label>--}}
{{--        <input type="file" class="py-2.5 px-4 form-control"--}}
{{--                aria-describedby="hs-input-helper-text" wire:model="logo_url"--}}
{{--               accept="" required--}}
{{--        >--}}
{{--        <div>@error('logo_url') <span class="error">{{ $message }}</span> @enderror </div>--}}
{{--        <br>--}}
{{--    </div>--}}
{{--    <div class="">--}}
{{--        <label for="" class="form-label mb-2 text-black">--}}
{{--            Company Qrcode--}}
{{--            <span class="text-red-600">*</span>--}}
{{--        </label>--}}
{{--        <input type="file" class="py-2.5 px-4 form-control"--}}
{{--               aria-describedby="hs-input-helper-text" wire:model="qrcode_url"--}}
{{--               accept="" required--}}
{{--        >--}}
{{--        <div>@error('qrcode_url') <span class="error">{{ $message }}</span> @enderror </div>--}}
{{--        <br>--}}
{{--    </div>--}}




{{--    --}}{{--    <input type="file" wire:model="logo_url">--}}


{{--    <x-input title="Username" model="username" />--}}







{{--    <input type="file" wire:model="qrcode_url">--}}

{{--    @error('qrcode_url') <span class="error">{{ $message }}</span> @enderror--}}

{{--    <button type="submit">Save photo</button>--}}
{{--</form>--}}

    <form wire:submit="{{ $action }}">
        <x-input title="Name company" model="title" required="true" />
        <x-input title="Company logo" model="logo_url" type="file" accept="image/png" ignore="{{true}}" />
        <x-input title="Company qrcode" model="qrcode_url" type="file" accept="image/png" ignore="{{true}}" />
            <x-select title="Company leader" model="user_id" :options="$usersOption" required="true"/>
        <input type="submit" class="btn" value="Save Company">
    </form>
