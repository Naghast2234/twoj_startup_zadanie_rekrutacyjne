<div class="p-4">
    <button wire:click="toggleModal" class="border border-amber-500">Dodaj dodatkowy adres e-mail do zalogowanego użytkownika</button>

    <div wire:show="showModal">
        <div class="p-4">
            <h1>Adres e-mail</h1>
            <input type="text" class="bg-[grey]" wire:model="email"></input>
        </div>
        <div>
            <h1>{{ $message }}</h1>
        </div>
        <button wire:click="submit" class="bg-amber-500 border border-amber-400 rounded-2xl">Zapisz</button>
    </div>
</div>
