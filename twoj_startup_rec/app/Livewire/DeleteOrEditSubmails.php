<?php

namespace App\Livewire;

use App\Models\Submail;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

#[Lazy] // So it is... Well, loading lazily. Who knows, it may take time to load it later, but if not it's still good practice to do it on loading stuff. Mostly.
class DeleteOrEditSubmails extends Component {

    public $showModal = true;

    public function toggleModal() {
        $this->showModal = !$this->showModal;
        $this->mount();
    }

    public $submails = [];

    // This is like, initial loading.
    public function mount() {
        $this->submails = [];

        $user = User::findOrFail(Auth::id());

        foreach($user->submails()->get() as $submail) {
            $this->submails[$submail->id] = $submail->email;
        }

        // dd($user->submails()->get());
    }

    public function delete(int $id) {
        $submail = Submail::findOrFail($id);

        $submail->delete();
        $this->mount();
    }

    public function update(int $id) {
        $submail = Submail::findOrFail($id);

        $submail->email = $this->submails["{$id}"];
        $submail->save();
        $this->mount();
    }

    public function render() {
        return view('livewire.delete-or-edit-submails');
    }
}
