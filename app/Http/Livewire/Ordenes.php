<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orden;
use App\Models\Adicional;
use Livewire\WithPagination;

class Ordenes extends Component
{
    use WithPagination;

    public $search = '';
    public $confirmingRecordDeletion = false;
    public $confirmingRecordAdd = false;
    public $record;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $datos = Orden::query()
            ->join('users', 'ordens.id_usuario', '=', 'users.id')
            ->join('platillos', 'ordens.id_platillo', '=', 'platillos.id')
            ->join('adicionals', 'platillos.id_tiempo_comida', '=', 'adicionals.id_tiempo_comida')
            ->select('ordens.*', 'users.name as cliente', 'platillos.nombre as platillo', 'platillos.precio as precio', 'adicionals.precio as precio_adicional')
            ->where('users.name', 'like', '%' . $this->search . '%')
            ->paginate(15);

        return view('livewire.ordenes', [
            'datos' => $datos,
        ]);
    }

    public function confirmRecordDeletion($id)
    {
        $this->confirmingRecordDeletion = $id;
    }

    public function deleteRecord(Orden $record)
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
            Orden::create([
                'nombre' => $this->record['nombre'],
                'precio' => $this->record['precio'],
                'ingredientes' => $this->record['ingredientes'],
                'id_tiempo_comida' => $this->record['id_tiempo_comida'],
            ]);
            session()->flash('message', 'Registro guardado con exito');
        }

        $this->confirmingRecordAdd = false;
    }

    public function confirmRecordEdit(Orden $record)
    {
        $this->record = $record;
        $this->confirmingRecordAdd = true;
    }
}
