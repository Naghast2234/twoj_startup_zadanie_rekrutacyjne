<?php

namespace App\Livewire;

use App\Models\Submail;
use Livewire\Component;
// use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AddSubmail extends Component {

    public $email = '';

    public $message = '';

    public $showModal = true;

    public function toggleModal() {
        $this->showModal = !$this->showModal;
        $this->email = '';
        $this->message = '';
    }

    /**
     * I'll be honest, it's... Probably unsafe and not the best practice to do it from this level. Maybe. But limited time.
     * @return void
     */
    public function submit() {
        // Reset the feedback message.
        $this->message = '';

        // Save the created submail.
        $submail = new Submail();

        $submail->user_id = Auth::id();
        $submail->email = $this->email;

        $submail->save();

        // This is used for feedback.
        $this->message = 'Submail added successfully.';
        $this->email = '';
    }


    public function render() {
        return view('livewire.add-submail');
    }
}
