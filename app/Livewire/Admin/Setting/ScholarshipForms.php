<?php

namespace App\Livewire\Admin\Setting;

use App\Livewire\Forms\Admin\Setting\ScholarshipDistrictForm;
use App\Models\DistrictScholarshipLimit;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('administrator.layouts.master')]
class ScholarshipForms extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $selectedDistrict = null;
    public $selectedCategory = null;
    public $searchString = null;

    public ScholarshipDistrictForm $form;
    // public $formsData;

    public function render()
    {
        $query = DistrictScholarshipLimit::with('EducationType:id,name')->with('District:id,name');
        // Apply filter conditions
        if (!empty(trim($this->selectedCategory . '')) && intval($this->selectedCategory) > 0) {
            $query->where('educationtype_id', intval($this->selectedCategory));
        }
        if (!empty(trim($this->selectedDistrict . '')) && intval($this->selectedDistrict) > 0) {
            $query->where('district_id', intval($this->selectedDistrict));
        }
        // Apply search conditions
        if (!empty(trim($this->searchString . ''))) {
            $searchTerm = '%' . $this->searchString . '%';

            $query->whereHas('District', function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm);
            })
                ->orWhereHas('EducationType', function ($q) use ($searchTerm) {
                    $q->where('name', 'like', $searchTerm);
                });
        }
        // get final data
        $formsData = $query->orderBy('district_id', 'asc')->orderBy('educationtype_id', 'asc')->paginate(10);

        return view('livewire.admin.setting.scholarship-forms', [
            'formsData' => $formsData
        ]);
    }

    public function addForms()
    {
        $this->form->store();
    }

    public function editForms($id)
    {
        $data = DistrictScholarshipLimit::find($id);
        $this->form->setData($data);
    }
    public function deleteForm($id)
    {
        return DistrictScholarshipLimit::destroy($id);
    }
}
