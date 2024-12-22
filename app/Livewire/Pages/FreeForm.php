<?php

namespace App\Livewire\Pages;

use App\Models\Corporate;
use App\Models\District;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class FreeForm extends Component
{
    use WithPagination, WithoutUrlPagination;

    public Collection $districts;
    public $selectedDistrict = '';

    public $sortKey = 'city';
    public $sortDirection = 'asc'; // desc
    public $entriesPerPage = 5;
    public $searchQuery = '';
    public $entiresArray = [5, 10, 15, 25, 50, 100, 0];
    public $query = '';

    public function mount()
    {
        $districts = Corporate::select('district_id')->where('signup_approved', 1)->whereNotNull('signup_at')->groupBy('district_id')->pluck('district_id');
        $this->districts = District::whereIn('id', $districts)->get();
    }

    public function dehydrate()
    {
        $this->js("console.log('dehydrate')");
        $this->js('interestedForInit()');
    }

    public function render()
    {
        // Fetch paginated institutes in render() and pass them to the view
        $institutesQuery = Corporate::where('is_approved', 1)->where('signup_approved', 1)->whereNotNull('signup_at');
        if ($this->query) {
            $institutesQuery->where('city', 'like', '%' . $this->query . '%');
            $institutesQuery->orWhere('name', 'like', '%' . $this->query . '%');
            $institutesQuery->orWhere('institute_name', 'like', '%' . $this->query . '%');
        }
        if ($this->selectedDistrict) {
            $institutesQuery->where('district_id', $this->selectedDistrict);
        }
        $institutesQuery->orderBy($this->sortKey, $this->sortDirection);
        if ($this->entriesPerPage == 0) {
            $institutes = $institutesQuery->get();
        } else {
            $institutes = $institutesQuery->paginate($this->entriesPerPage);
        }

        // return print_r($this->institutes);

        return view('livewire.pages.free-form', [
            'institutes' => $institutes
        ]);
    }

    // public function updated($property){
    //     $this->js("console.log('updated')");
    //     $this->js('interestedForInit()');
    // }
}
