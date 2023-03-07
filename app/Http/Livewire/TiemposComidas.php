<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TiempoComida;
use Livewire\WithPagination;

class TiemposComidas extends Component
{
    use WithPagination;

    public $search = '';
    public $confirmingRecordDeletion = false;
    public $confirmingRecordAdd = false;
    public $record;

    protected $rules = [
        'record.nombre' => 'required|string|min:3',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $datos = TiempoComida::query()
            ->select('tiempo_comidas.*')
            ->where('tiempo_comidas.nombre', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.tiempos-comidas', [
            'datos' => $datos,
        ]);
    }

    public function confirmRecordDeletion($id)
    {
        $this->confirmingRecordDeletion = $id;
    }

    public function deleteRecord(TiempoComida $record)
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
            TiempoComida::create([
                'nombre' => $this->record['nombre'],
            ]);
            session()->flash('message', 'Registro guardado con exito');
        }

        $this->confirmingRecordAdd = false;
    }

    public function confirmRecordEdit(TiempoComida $record)
    {
        $this->record = $record;
        $this->confirmingRecordAdd = true;
    }
}
