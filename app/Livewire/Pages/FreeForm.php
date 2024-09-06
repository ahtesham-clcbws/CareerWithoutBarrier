<?php

namespace App\Livewire\Pages;

use App\Models\Corporate;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class FreeForm extends Component
{
    use WithPagination, WithoutUrlPagination;

    public array $cities = [];
    public $sortKey = 'city';
    public $sortDirection = 'asc'; // desc
    public $selectedCity = '';
    public $entriesPerPage = 5;
    public $searchQuery = '';
    public $entiresArray = [1,5, 10, 15, 25, 50, 100, 0];
    public $query = '';

    public function mount()
    {
        $this->cities = Corporate::select('city')->where('signup_approved', 1)->whereNotNull('signup_at')->groupBy('city')->pluck('city')->toArray();
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
        if ($this->selectedCity) {
            $institutesQuery->where('city', $this->selectedCity);
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
}
