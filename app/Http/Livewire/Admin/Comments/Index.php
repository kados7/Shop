<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];
    public $approved;
    public $title;
    public $approve_submited = false;

    // public function updatedApproved(){
    //     dd($this->approved);
    // }
    public function mount(){
        $this->approved= Comment::pluck('approved','id')->toArray();
        $this->title= Comment::pluck('title','id')->toArray();
    }

    public function approve_selected(){
        foreach($this->approved as $approved_id => $approved_value){
            $comment = Comment::where('id' , $approved_id)->first();
            $comment->update([
                'approved' => $approved_value,
            ]);
        }
        $this->approve_submited =true ;
        $this->emit('refreshComponent');

    }

    public function delete($comment_id){
        $comment= Comment::find($comment_id);
        $comment->delete();

        $this->emit('refreshComponent');

    }


    public function render()
    {
        return view('livewire.admin.comments.index' , [
            'comments' => Comment::paginate(20),
        ]);
    }
}
