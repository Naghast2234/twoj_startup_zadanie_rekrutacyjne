<?php

namespace App\Livewire;

use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;

class SendEmails extends Component {

    public $users = [];

    public int $selectedUser = -1;

    public $showModal = true;

    public function toggleModal() {
        $this->showModal = !$this->showModal;
        $this->mount();
    }


    public function mount() {
        $this->users = [];
        $users = User::all();

        foreach($users as $user) {
            $this->users[$user->id] = $user->name;
        }
    }

    public function submit() {

        // dd($this->selectedUser);
        $user = User::findOrFail($this->selectedUser); // We need to be able to select the user. Somehow.

        $mails = [];

        $mails[] = $user->email;

        foreach($user->submails()->get() as $submail) {
            $mails[] = $submail->email;
        }

        // dd($mails);
        foreach($mails as $mail) {
            Mail::to($mail)->send(new Welcome($user->name));
            // sleep(10); // For the sake of testing, comment out later.
        }

        // Add an email sending script here i suppose.

        $this->mount(); // Reset the data

    }
    public function render()
    {
        return view('livewire.send-emails');
    }
}
