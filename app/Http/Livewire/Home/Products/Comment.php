<?php

namespace App\Http\Livewire\Home\Products;

use App\Models\Comment as Comment_model;
use App\Models\ProductRate;
use App\Models\Role;
use App\Models\User;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Comment extends Component
{
    public $product;
    public $title;
    public $text;
    public $is_recommended=1;
    public $rate = 3;
    public $allRate=[];

    public function mount(){
        $this->allRate = $this->product->rates->pluck('rate','user_id')->toArray();
    }

    //Validation Rules
    protected $rules = [
        'title' => 'string|min:5',
        'text' => 'required|min:5',
        'rate' => 'required|integer|between:1,5',
        'is_recommended' => 'boolean'
    ];

    public function submit_comment(){

        $this->validate();

        try {
            DB::beginTransaction();
            $new_comment= Comment_model::create([
                'user_id' => auth()->id(),
                'product_id' => $this->product->id,
                'title' => $this->title,
                'text' => $this->text,
                'is_recommended' => $this->is_recommended,
            ]);

            if($this->product->rates()->where('user_id' , auth()->id())->exists()){

                $productRate= $this->product->rates()->where('user_id' , auth()->id()) ->first();
                $productRate->update([
                    'rate' => $this->rate,
                ]);

            }else{
                ProductRate::create([
                    'user_id' => auth()->id(),
                    'product_id' => $this->product->id,
                    'rate' => $this->rate,
                ]);
            }


            DB::commit();

        }catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ثبت دیدگاه  ', $ex->getMessage())->persistent('حله');
            dd('Problem');
        }

        // Notification to Admin
        // $user_admin = User::find(1);

        $user_admin = Role::where('name','admin')->first()->users;
        // dd($user_admin);
        Notification::send($user_admin , new CommentNotification($new_comment));

        // return
        alert()->success('دیدگاه ثبت شد','در حال بررسی و ثبت نهایی دیدگاه');
        return redirect(route('home.products.show' , ['product' => $this->product->slug]));
    }


    public function render()
    {
        return view('livewire.home.products.comment' , [
            'comments' => $this->product->comments()->where('approved',true)->with('user')->get(),
        ]);
    }
}
