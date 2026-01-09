<div>
    <button wire:click="toggleModal" class="border border-amber-500">Wybierz użytkownika do którego wysłać e-mail</button>
    <div wire:show="showModal">
        <select wire:model="selectedUser">
            @foreach ($this->users as $key => $name)
                <option value="{{ $key }}">{{ $name }}</option>
            @endforeach
        </select>
        <button wire:click="submit" class="bg-amber-500 border border-amber-400 rounded-2xl">Wyślij</button>
    </div>
</div>
