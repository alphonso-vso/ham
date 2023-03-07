<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $search = '';
    public $confirmingRecordDeletion = false;
    public $confirmingRecordAdd = false;
    public $record;

    protected $rules = [
        'record.name' => 'required|string|min:3',
        'record.email' => 'required|email|min:10',
    ];
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $datos = User::query()
            ->select('users.*')
            ->where('users.name', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.users', [
            'datos' => $datos,
        ]);
    }

    public function confirmRecordDeletion($id)
    {
        $this->confirmingRecordDeletion = $id;
    }

    public function deleteRecord(User $record)
    {
        $record->delete();
        $this->confirmingRecordDeletion = false;
        session()->flash('message', 'Registro eliminado con exito');
    }

    public function confirmRecordAdd()
    {
        $this->reset(['record']);
        $this->confirmingRecordAdd = true;
    }

    public function saveRecord()
    {
        $this->validate();

        if (isset($this->record->id))
        {
            $this->record->save();
            session()->flash('message', 'Registro actualizado con exito');
        }
        else
        {
            User::create([
                'nombre' => $this->record['nombre'],
            ]);
            session()->flash('message', 'Registro guardado con exito');
        }

        $this->confirmingRecordAdd = false;
    }

    public function confirmRecordEdit(User $record)
    {
        $this->record = $record;
        $this->confirmingRecordAdd = true;
    }
}
