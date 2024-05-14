<form wire:submit="create">
    <x-input title="Link" model="url" required="true"/>
    <x-input title="Redirect Link" model="redirect_url" required="true"/>
    <input type="submit" class="btn" value="Save Company">
</form>
