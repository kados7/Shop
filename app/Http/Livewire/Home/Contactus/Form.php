<?php

namespace App\Http\Livewire\Home\Contactus;

use App\Models\ContactUs;
use App\Models\Setting;
use Livewire\Component;

class Form extends Component
{
    public $name;
    public $email;
    public $subject;
    public $text;

    protected $name_protect;
    protected $email_protect;
    protected $subject_protect;
    protected $text_protect;

    protected $rules=[
        'name' => 'required',
        'email' => 'required',
        'subject' => 'required',
        'text' => 'required',
    ];

    public function submit_form(){

        $this->name_protect = $this->name;
        $this->email_protect = $this->email;
        $this->subject_protect = $this->subject;
        $this->text_protect = $this->text;
        $this->validate();
        ContactUs::create([
            'name'=> $this->name_protect,
            'email'=> $this->email_protect,
            'subject'=> $this->subject_protect,
            'text'=> $this->text_protect,
        ]);

        alert()->success('پیام شما ثبت شد');
        return redirect(route('home.contact-us'));
    }

    public function render()
    {
        return view('livewire.home.contactus.form' , [
            'setting' => Setting::first(),
        ]);
    }
}
