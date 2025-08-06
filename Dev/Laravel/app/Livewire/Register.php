<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Symfony\Contracts\Service\Attribute\Required;

class Register extends Component
{
    use WithFileUploads;

    #[Rule('Required|min:3|max:15')]
    public $name;

    #[Rule('Required|max:255|unique:users')]
    public $email;

    #[Rule('Required|nullable|sometimes|file|max:1024')]
    public $profile;

    #[Rule('Required|min:3')]
    public $password;

    public function create()
    {
        $validated = $this->validate();

        if ($this->profile) {
            $this->profile->store('uploads', 'public');
        }

        User::create($validated);

        $this->reset('name', 'email', 'profile', 'password');

        session()->flash('success', 'User created');
    }


    public function render()
    {
        return view('livewire.register');
    }
}
