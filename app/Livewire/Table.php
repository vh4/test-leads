<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Lead;

class Table extends Component
{

    public $search;

    public $id;

    public function render()
    {
        $leads = Lead::where('name', 'like', '%' . $this->search . '%')->orwhere('email', 'like', '%' . $this->search . '%')->orwhere('phone', 'like', '%' . $this->search . '%')->orwhere('product_interest', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.table', compact('leads'));
    }

    public function deal($id){
        $lead = Lead::findOrFail($id);
        
        if($lead->status == 'Processing' && $lead->score >= 20){
            $lead->status = 'Closed';
            $lead->score = 100;
            $lead->save();
        }

        return redirect()->back()->with('success','Lead Deal Added Successfully');

    }

    public function followUp($id){
        $lead = Lead::findOrFail($id);
        if($lead->status == 'New'){
            $lead->status = 'Processing';
            $lead->score =+ 20;
            $lead->save();
        }

        return redirect()->back()->with('success','Lead Follow Up Added Successfully');
    }

    public function delete($id){
        $lead = Lead::findOrFail($id);
        $lead->delete();
        return redirect()->back()->with('success','Lead Deleted Successfully');   
    }

}
