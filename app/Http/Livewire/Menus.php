<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Platillo;
use App\Models\Dia;
use App\Models\PlatilloDia;
use App\Models\Orden;
use App\Models\Factura;
use Auth;

class Menus extends Component
{
    public $confirmingRecordAddL = false;
    public $confirmingRecordAddM = false;
    public $confirmingRecordAddK = false;
    public $confirmingRecordAddJ = false;
    public $confirmingRecordAddV = false;
    public $confirmingRecordAddS = false;
    public $confirmingRecordAddD = false;
    public $confirmingRecordAddO = false;
    public $l;
    public $m;
    public $k;
    public $j;
    public $v;
    public $s;
    public $d;
    public $o;
    public array $recordsL;
    public array $recordsM;
    public array $recordsK;
    public array $recordsJ;
    public array $recordsV;
    public array $recordsS;
    public array $recordsD;
    public array $recordsO;

    public function mount()
    {
        $this->recordsL = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia', 'platillos.id as pid')
            ->where('dias.nombre', '=', 'Lunes')->pluck("platillo", "pid")->toArray();

        $this->recordsM = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia', 'platillos.id as pid')
            ->where('dias.nombre', '=', 'Martes')->pluck("platillo", "pid")->toArray();
            
        $this->recordsK = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia', 'platillos.id as pid')
            ->where('dias.nombre', '=', 'Miércoles')->pluck("platillo", "pid")->toArray();
            
        $this->recordsJ = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia', 'platillos.id as pid')
            ->where('dias.nombre', '=', 'Jueves')->pluck("platillo", "pid")->toArray();
            
        $this->recordsV = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia', 'platillos.id as pid')
            ->where('dias.nombre', '=', 'Viernes')->pluck("platillo", "pid")->toArray();
            
        $this->recordsS = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia', 'platillos.id as pid')
            ->where('dias.nombre', '=', 'Sábado')->pluck("platillo", "pid")->toArray();
            
        $this->recordsD = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia', 'platillos.id as pid')
            ->where('dias.nombre', '=', 'Domingo')->pluck("platillo", "pid")->toArray();
            
        $this->recordsO = Platillo::query()
            ->select('platillos.nombre as platillo', 'platillos.id as pid')
            ->where('id_tiempo_comida', '=', '4')->pluck("platillo", "pid")->toArray();
    }

    public function render()
    {
        $datosL = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia')
            ->where('dias.nombre', '=', 'Lunes')
            ->paginate(10);
            
        $datosM = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia')
            ->where('dias.nombre', '=', 'Martes')
            ->paginate(10);

        $datosK = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia')
            ->where('dias.nombre', '=', 'Miércoles')
            ->paginate(10);

        $datosJ = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia')
            ->where('dias.nombre', '=', 'Jueves')
            ->paginate(10);

        $datosV = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia')
            ->where('dias.nombre', '=', 'Viernes')
            ->paginate(10);

        $datosS = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia')
            ->where('dias.nombre', '=', 'Sábado')
            ->paginate(10);

        $datosD = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia')
            ->where('dias.nombre', '=', 'Domingo')
            ->paginate(10);

        $datosO = Platillo::query()
            ->where('id_tiempo_comida', '=', '4')->get();
            
        return view('livewire.menus', [
            'datosL' => $datosL,
            'datosM' => $datosM,
            'datosK' => $datosK,
            'datosJ' => $datosJ,
            'datosV' => $datosV,
            'datosS' => $datosS,
            'datosD' => $datosD,
            'datosO' => $datosO,
        ]);
    }

    // Lunes
    public function confirmRecordAddL()
    {
        $this->reset(['l']);
        $this->l['cantidad'] = 1;
        $this->l['adicionales'] = 0;
        $this->confirmingRecordAddL = true;
    }

    public function saveRecordL()
    {
        $lun = Orden::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->l['id_platillo'],
            'id_estado' => 0,
            'cantidad' => $this->l['cantidad'],
            'adicionales' => $this->l['adicionales'],
        ]);
        Factura::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->l['id_platillo'],
            'id_estado' => 0,
            'id_orden' => $lun->id,
            'cantidad' => $this->l['cantidad'],
            'adicionales' => $this->l['adicionales'],
        ]);
        session()->flash('message', 'Registro guardado con exito');

        $this->confirmingRecordAddL = false;
    }

    // Martes
    public function confirmRecordAddM()
    {
        $this->reset(['m']);
        $this->m['cantidad'] = 1;
        $this->m['adicionales'] = 0;
        $this->confirmingRecordAddM = true;
    }

    public function saveRecordM()
    {
        
        Orden::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->m['id_platillo'],
            'id_estado' => 0,
            'cantidad' => $this->m['cantidad'],
            'adicionales' => $this->m['adicionales'],
        ]);
        Factura::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->m['id_platillo'],
            'id_estado' => 0,
            'cantidad' => $this->m['cantidad'],
            'adicionales' => $this->m['adicionales'],
        ]);
        session()->flash('message', 'Registro guardado con exito');

        $this->confirmingRecordAddM = false;
    }

    // Miércoles
    public function confirmRecordAddK()
    {
        $this->reset(['k']);
        $this->k['cantidad'] = 1;
        $this->k['adicionales'] = 0;
        $this->confirmingRecordAddK = true;
    }

    public function saveRecordK()
    {
        Orden::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->k['id_platillo'],
            'id_estado' => 0,
            'cantidad' => $this->k['cantidad'],
            'adicionales' => $this->k['adicionales'],
        ]);
        Factura::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->k['id_platillo'],
            'id_estado' => 0,
            'cantidad' => $this->k['cantidad'],
            'adicionales' => $this->k['adicionales'],
        ]);
        session()->flash('message', 'Registro guardado con exito');
        
        $this->confirmingRecordAddK = false;
    }

    // Jueves
    public function confirmRecordAddJ()
    {
        $this->reset(['j']);
        $this->j['cantidad'] = 1;
        $this->j['adicionales'] = 0;
        $this->confirmingRecordAddJ = true;
    }

    public function saveRecordJ()
    {
        Orden::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->j['id_platillo'],
            'id_estado' => 0,
            'cantidad' => $this->j['cantidad'],
            'adicionales' => $this->j['adicionales'],
        ]);
        Factura::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->j['id_platillo'],
            'id_estado' => 0,
            'cantidad' => $this->j['cantidad'],
            'adicionales' => $this->j['adicionales'],
        ]);
        session()->flash('message', 'Registro guardado con exito');

        $this->confirmingRecordAddJ = false;
    }

    // Viernes
    public function confirmRecordAddV()
    {
        $this->reset(['v']);
        $this->v['cantidad'] = 1;
        $this->v['adicionales'] = 0;
        $this->confirmingRecordAddV = true;
    }

    public function saveRecordV()
    {
        Orden::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->v['id_platillo'],
            'id_estado' => 0,
            'cantidad' => $this->v['cantidad'],
            'adicionales' => $this->v['adicionales'],
        ]);
        Factura::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->v['id_platillo'],
            'id_estado' => 0,
            'cantidad' => $this->v['cantidad'],
            'adicionales' => $this->v['adicionales'],
        ]);
        session()->flash('message', 'Registro guardado con exito');
        
        $this->confirmingRecordAddV = false;
    }

    // Sábado
    public function confirmRecordAddS()
    {
        $this->reset(['s']);
        $this->s['cantidad'] = 1;
        $this->s['adicionales'] = 0;
        $this->confirmingRecordAddS = true;
    }

    public function saveRecordS()
    {
        Orden::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->s['id_platillo'],
            'id_estado' => 0,
            'cantidad' => $this->s['cantidad'],
            'adicionales' => $this->s['adicionales'],
        ]);
        Factura::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->s['id_platillo'],
            'id_estado' => 0,
            'cantidad' => $this->s['cantidad'],
            'adicionales' => $this->s['adicionales'],
        ]);
        session()->flash('message', 'Registro guardado con exito');

        $this->confirmingRecordAddS = false;
    }

    // Domingo
    public function confirmRecordAddD()
    {
        $this->reset(['d']);
        $this->d['cantidad'] = 1;
        $this->d['adicionales'] = 0;
        $this->confirmingRecordAddD = true;
    }

    public function saveRecordD()
    {
        Orden::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->d['id_platillo'],
            'id_estado' => 0,
            'cantidad' => $this->d['cantidad'],
            'adicionales' => $this->d['adicionales'],
        ]);
        Factura::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->d['id_platillo'],
            'id_estado' => 0,
            'cantidad' => $this->d['cantidad'],
            'adicionales' => $this->d['adicionales'],
        ]);
        session()->flash('message', 'Registro guardado con exito');

        $this->confirmingRecordAddD = false;
    }

    // Otros
    public function confirmRecordAddO()
    {
        $this->reset(['o']);
        $this->o['cantidad'] = 1;
        $this->o['adicionales'] = 0;
        $this->confirmingRecordAddO = true;
    }

    public function saveRecordO()
    {
        Orden::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->o['id_platillo'],
            'id_estado' => 0,
            'cantidad' => $this->o['cantidad'],
            'adicionales' => $this->o['adicionales'],
        ]);
        Factura::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->o['id_platillo'],
            'id_estado' => 0,
            'cantidad' => $this->o['cantidad'],
            'adicionales' => $this->o['adicionales'],
        ]);
        session()->flash('message', 'Registro guardado con exito');

        $this->confirmingRecordAddO = false;
    }
}
