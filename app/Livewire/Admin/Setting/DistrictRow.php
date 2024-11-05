<?php

namespace App\Livewire\Admin\Setting;

use App\Models\District;
use Livewire\Component;

class DistrictRow extends Component
{
    public $index;
    public $district;
    public $isActive;

    public $formsCount;
    public $totalFormsCount;

    public $studentCount;
    public $editFormsCount = false;

    public function mount(District $district, $index)
    {
        $this->index = $index;
        $this->district = $district;
        $this->isActive = $district->isActive;
        $this->formsCount = $district->total_forms;
        $this->totalFormsCount = $district->total_forms;
        $this->studentCount = count($district->students);
    }
    public function render()
    {
        return view('livewire.admin.setting.district-row');
    }
    public function changeStatus()
    {
        try {
            $district = District::withoutGlobalScope('active')->find($this->district->id);
            if (!$district) {
                $this->js("alert('District not found.')");
                return false;
            }
            $district->isActive = !$district->isActive;
            $district->save();

            $this->district = $district;
            $this->isActive = $this->district->isActive;

            $this->js("success('Status Updated successfully.')");
            return true;
        } catch (\Throwable $th) {
            $this->js("error('" . $th->getMessage() . "')");
            return false;
        }
    }
    public function showEditForm()
    {
        $this->totalFormsCount = $this->formsCount;
        $this->editFormsCount = true;
    }
    public function closeEditForm()
    {
        $this->totalFormsCount = $this->formsCount;
        $this->editFormsCount = false;
    }
    public function save()
    {
        try {
            if ($this->totalFormsCount >= count($this->district->students)) {
                $this->district->total_forms = $this->totalFormsCount;
                $this->district->save();

                $this->formsCount = $this->totalFormsCount;
                $this->editFormsCount = false;
                $this->js("success('Updated successfully.')");
                return true;
            } else {
                $this->js("error('Forms not less than current students submission.')");
                return false;
            }
        } catch (\Throwable $th) {
            $this->js("error('" . $th->getMessage() . "')");
            return false;
        }
    }
}
