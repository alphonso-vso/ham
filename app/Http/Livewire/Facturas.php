<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Factura;
use App\Models\Adicional;
use Livewire\WithPagination;
use Auth;

class Facturas extends Component
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
        $datos = Factura::query()
            ->join('users', 'facturas.id_usuario', '=', 'users.id')
            ->join('platillos', 'facturas.id_platillo', '=', 'platillos.id')
            ->join('adicionals', 'platillos.id_tiempo_comida', '=', 'adicionals.id_tiempo_comida')
            ->select('facturas.*', 'users.name as cliente', 'platillos.nombre as platillo', 'platillos.precio as precio', 'adicionals.precio as precio_adicional')
            ->where('users.name', 'like', '%' . $this->search . '%')
            ->where('users.id', '=', Auth::user()->id)
            ->paginate(15);

        return view('livewire.facturas', [
            'datos' => $datos,
        ]);
    }
}
