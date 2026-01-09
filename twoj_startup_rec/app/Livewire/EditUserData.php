<?php

namespace App\Livewire;

use Livewire\Attributes\Lazy;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

#[Lazy]
class EditUserData extends Component {

    public $email = '';

    public $phone = '';

    public $name = '';

    public $showModal = true;

    public $message = '';

    public function toggleModal() {
        $this->showModal = !$this->showModal;
        $this->message = '';
        $this->mount();
    }

    public function mount() {
        $user = User::findOrFail(Auth::id());

        $this->email = $user->email;

        $this->phone = $user->phone;

        $this->name = $user->name;

    }

    public function submit() {
        $this->message = '';

        $user = User::findOrFail(Auth::id());

        // I REALLY KNOW IT SHOULDN'T BE THAT EASY TO CHANGE BUT THIS IS A RECRUITMENT TASK ON RATHER SHORT DEADLINE I HAVE TO GET IT DONE

        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->name = $this->name;

        $user->save();

        $this->mount(); // Re-load the data of this element.

        $this->message = 'Zapisano zmiany';

    }

    public function render() {
        return view('livewire.edit-user-data');
    }
}
