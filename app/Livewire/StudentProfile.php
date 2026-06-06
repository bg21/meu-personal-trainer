<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;

class StudentProfile extends Component
{
    public Student $student;
    
    public $activeTab = 'dados';

    public function mount($id)
    {
        $this->student = Student::findOrFail($id);
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.student-profile')
            ->layout('components.layouts.app', [
                'title' => $this->student->name . ' | PTManager',
                'header' => 'Perfil do Aluno'
            ]);
    }
}
