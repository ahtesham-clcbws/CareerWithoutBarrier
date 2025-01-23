<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('student.layouts.master')]
class StudentProfile extends Component
{
    use WithFileUploads;

    public Student $student;

    #[Validate('required', message: 'Name is required')]
    #[Validate('min:3', message: 'Name must have minimum 3 characters')]
    #[Validate('max:255', message: 'Name does not exceed 255 characters')]
    public $name;

    #[Validate('image', message: 'The photo must be an image file.')]
    #[Validate('mimes:jpeg,png', message: 'The photo must be a JPEG or PNG image.')]
    #[Validate('max:2048', message: 'File size must not exceed 2MB.')]
    public $photo;

    #[Validate('required', message: 'Please select Gender')]
    public $gender;

    #[Validate('required', message: 'Disability is required')]
    #[Validate('in:Yes,No', message: 'Please choose disability')]
    public $disability = 'No';


    public function mount()
    {
        $studentUser = Auth::guard('student')->user();
        $this->student = Student::find($studentUser->id);

        $this->name = $this->student->name;

        $this->gender = $this->student->gender;

        $this->disability = $this->student->disability;
    }

    public function render()
    {
        return view('livewire.student.student-profile');
    }


    public function cancelUpload()
    {
        $this->js('window.location.reload()');
        try {
            $this->photo = null;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function uploadImage()
    {
        $this->validate([
            'photo' => 'image|max:2048'
        ]);

        $photograph = $this->photo->store('student/' . $this->student->id, 'public');

        $this->student->photograph = $photograph;
        $this->student->save();

        $this->photo = null;

        $this->js('success("Profile picture updated successfully")');
        $this->js('window.location.reload()');
    }

    public function updateName()
    {
        $this->validate([
            'name' => 'required|min:3|max:255'
        ]);

        $this->student->name = $this->name;
        $this->student->save();

        $this->js('success("Name updated successfully")');
    }
    public function updateGender()
    {
        $this->validate([
            'gender' => 'required'
        ]);

        $this->student->gender = $this->gender;
        $this->student->save();

        $this->js('success("Gender updated successfully")');
    }
    public function updateDisability()
    {
        $this->validate([
            'disability' => 'required|in:Yes,No'
        ]);

        $this->student->disability = $this->disability;
        $this->student->save();

        $this->js('success("Disability updated successfully")');
    }
}
