<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Lead;

class CreateLeads extends Component
{
    #[Validate(["required", "string", "min:3", "max:255"])]
    public $name;

    #[Validate(["required", "string", "email", "unique:leads,email", "max:255"])]
    public $email;

    #[Validate(["required", "string", "min:5", "unique:leads,phone", "numeric"])]
    public $phone;

    #[Validate(["required", "string", "min:3", "max:255"])]
    public $product_interest;

    public $score = 0;
    public $status = 'New';


    public function createLeaders(){


        $this->validate();

        Lead::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'product_interest' => $this->product_interest,
            'score' => $this->score,
            'status' => $this->status,
        ]);

        // meessage flash
        session()->flash('success','Lead created successfully');
        return redirect()->route('home');

    }

    public function render()
    {
        return view('livewire.create-leads');
    }
}
