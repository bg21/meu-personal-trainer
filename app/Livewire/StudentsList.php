<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;

class StudentsList extends Component
{
    use WithPagination;

    public $search = '';
    public $status = 'all';

    // Form fields
    public $studentId = null;
    public $name = '';
    public $email = '';
    public $phone = '';
    public $goal = '';
    public $studentStatus = 'active';

    public $showModal = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => 'all'],
    ];

    protected function rules()
    {
        return [
            'name' => 'required|min:3|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'goal' => 'nullable|string|max:255',
            'studentStatus' => 'required|in:active,pending,inactive',
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function openModal()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function editStudent($id)
    {
        $this->resetForm();
        $student = Student::findOrFail($id);
        
        $this->studentId = $student->id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->phone = $student->phone;
        $this->goal = $student->goal;
        $this->studentStatus = $student->status;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        // Fallback robusto para o tenant_id caso não haja usuário logado (ambiente de dev)
        $tenantId = auth()->check() ? auth()->user()->tenant_id : \App\Models\Tenant::firstOrCreate(
            ['id' => 1],
            ['name' => 'Personal Trainer Default', 'slug' => 'personal-default']
        )->id;

        $data = [
            'tenant_id' => $tenantId,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'goal' => $this->goal,
            'status' => $this->studentStatus,
        ];

        if (!$this->studentId) {
            $data['access_token'] = \Illuminate\Support\Str::random(32);
        }

        Student::updateOrCreate(
            ['id' => $this->studentId],
            $data
        );

        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->resetErrorBag();
        $this->studentId = null;
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->goal = '';
        $this->studentStatus = 'active';
    }

    public function render()
    {
        $students = Student::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->when($this->status !== 'all', function ($query) {
                $query->where('status', $this->status);
            })
            ->latest()
            ->paginate(10);

        return view('livewire.students-list', [
            'students' => $students
        ])->layout('components.layouts.app', ['title' => 'Alunos | PTManager', 'header' => 'Gestão de Alunos']);
    }
}
