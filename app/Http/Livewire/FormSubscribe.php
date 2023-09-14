<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Subscriber;


class FormSubscribe extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|max:255|email:dns'
    ];

    protected function resetInput(){
        $this->email = '';
    }

    public function submitSubscribe(){
        $this->validate();

        $user = User::where('email',$this->email)->first();
        $subscriber = Subscriber::where('email',$this->email)->first();

        if ($user != null) {
            $user->update([
                'subscribe' => true
            ]);

            $msg = 'Email successfully subscribed';
            $this->emit('showToast', $msg);
            
        } elseif ($subscriber == null ) {
            Subscriber::create([
                'email' => $this->email,
                'subscribe' => true
            ]);

            $msg = 'Email successfully subscribed';
            $this->emit('showToast', $msg);

        } elseif ($subscriber != null){
            $subscriber->update([
                'subscribe' => true
            ]);

            $msg = 'Email successfully subscribed';
            $this->emit('showToast', $msg);

        } else{

            $msg = 'Email already subscribed';
            $this->emit('showToast', $msg);
        }

        $this->resetInput();
    }

    public function render()
    {
        return view('livewire.form-subscribe');
    }
}
