<form wire:submit.prevent="update">

    <h2 style="font-size: 24px">Reset password {{ $user->user_nicename }}</h2>
    <br><br>

    <x-input title="Password" model="password" type="password"/>
    <x-input title="Password" model="rePassword" type="password"/>
    <button type="submit" class="text-center rounded-lg py-[10px] px-[20px] text-base bg-blue-600 hover:bg-blue-700 text-white font-medium ">
        Submit
    </button>

</form>
