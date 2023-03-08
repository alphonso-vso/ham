<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PlatilloDia;
use App\Models\Platillo;
use App\Models\Dia;
use Livewire\WithPagination;

class PlatillosDias extends Component
{
    use WithPagination;

    public $search = '';
    public $confirmingRecordDeletion = false;
    public $confirmingRecordAdd = false;
    public array $recordsOne;
    public array $recordsTwo;
    public $record;

    protected $rules = [
        'record.id_platillo' => 'required|numeric',
        'record.id_dia' => 'required|numeric',

    ];

    public function mount()
    {
        $this->recordsOne = Platillo::pluck("nombre", "id")->toArray();
        $this->recordsTwo = Dia::pluck("nombre", "id")->toArray();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $datos = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia')
            ->where('dias.nombre', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.platillos-dias', [
            'datos' => $datos,
        ]);
    }

    public function confirmRecordDeletion($id)
    {
        $this->confirmingRecordDeletion = $id;
    }

    public function deleteRecord(PlatilloDia $record)
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
            PlatilloDia::create([
                'id_platillo' => $this->record['id_platillo'],
                'id_dia' => $this->record['id_dia'],
            ]);
            session()->flash('message', 'Registro guardado con exito');
        }

        $this->confirmingRecordAdd = false;
    }

    public function confirmRecordEdit(PlatilloDia $record)
    {
        $this->record = $record;
        $this->confirmingRecordAdd = true;
    }
}
