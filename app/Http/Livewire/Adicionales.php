<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Adicional;
use App\Models\TiempoComida;
use Livewire\WithPagination;

class Adicionales extends Component
{
    use WithPagination;

    public $search = '';
    public $confirmingRecordDeletion = false;
    public $confirmingRecordAdd = false;
    public array $records;
    public $record;

    protected $rules = [
        'record.nombre' => 'required|string|min:3',
        'record.precio' => 'required|numeric',
        'record.id_tiempo_comida' => 'required|numeric',

    ];

    public function mount()
    {
        $this->records = TiempoComida::pluck("nombre", "id")->toArray();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $datos = Adicional::query()
            ->join('tiempo_comidas', 'adicionals.id_tiempo_comida', '=', 'tiempo_comidas.id')
            ->select('adicionals.*', 'tiempo_comidas.nombre as tiempo')
            ->where('adicionals.nombre', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.adicionales', [
            'datos' => $datos,
        ]);
    }

    public function confirmRecordDeletion($id)
    {
        $this->confirmingRecordDeletion = $id;
    }

    public function deleteRecord(Adicional $record)
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
            Adicional::create([
                'nombre' => $this->record['nombre'],
                'precio' => $this->record['precio'],
                'id_tiempo_comida' => $this->record['id_tiempo_comida'],
            ]);
            session()->flash('message', 'Registro guardado con exito');
        }

        $this->confirmingRecordAdd = false;
    }

    public function confirmRecordEdit(Adicional $record)
    {
        $this->record = $record;
        $this->confirmingRecordAdd = true;
    }
}
