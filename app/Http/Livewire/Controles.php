<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Factura;
use App\Models\Adicional;
use Livewire\WithPagination;
use Auth;
use Illuminate\Support\Facades\DB;

class Controles extends Component
{
    use WithPagination;

    public $search = '';
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
            ->where('facturas.id_estado', '=', 0)
            ->orderBy('facturas.id', 'DESC')
            ->paginate(50);

        $datos_totales = Factura::query()
            ->join('users', 'facturas.id_usuario', '=', 'users.id')
            ->join('platillos', 'facturas.id_platillo', '=', 'platillos.id')
            ->join('adicionals', 'platillos.id_tiempo_comida', '=', 'adicionals.id_tiempo_comida')
            ->select([DB::raw('users.name as cliente'), 
                DB::raw('SUM((platillos.precio * facturas.cantidad) + (adicionals.precio * facturas.adicionales)) as totales')]
                
            )
            ->where('users.id', '=', Auth::user()->id)
            ->where('facturas.id_estado', '=', 0)
            ->groupBy('users.name')
            ->get();

        return view('livewire.controles', [
            'datos' => $datos,
            'datos_totales' => $datos_totales,
        ]);
    }
}
