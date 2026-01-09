<div>
    <button wire:click="toggleModal" class="border border-amber-500">Edytuj dodatkowe adresy e-mail zalogowanego użytkownika</button>
    {{-- The Master doesn't talk, he acts. --}}
    <div wire:show="showModal">
        @foreach ($this->submails as $key => $email)
            <div class="p-4">
                <h1>Adres e-mail</h1>
                <input class="bg-[grey]" wire:model="submails.{{ $key }}" type="text"/>
                <button class="bg-amber-500 border border-amber-400 rounded-2xl" wire:click="update({{ $key }})">Zapisz zmiany</button>
                <button class="bg-amber-500 border border-amber-400 rounded-2xl" wire:click="delete({{ $key }})">Usuń e-mail</button>
            </div>
        @endforeach
    </div>
</div>
