<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Platillo;
use App\Models\Dia;
use App\Models\PlatilloDia;
use App\Models\Orden;
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

    public function mount()
    {
        $this->recordsL = PlatilloDia::query()
            ->join('platillos', 'platillo_dias.id_platillo', '=', 'platillos.id')
            ->join('dias', 'platillo_dias.id_dia', '=', 'dias.id')
            ->select('platillo_dias.*', 'platillos.nombre as platillo', 'dias.nombre as dia', 'platillos.id as pid')
            ->where('dias.nombre', '=', 'Lunes')->pluck("platillo", "pid")->toArray();
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
        Orden::create([
            'id_usuario' => Auth::user()->id,
            'id_platillo' => $this->l['id_platillo'],
            'id_estado' => 0,
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
        $this->confirmingRecordAddM = true;
    }

    public function saveRecordM()
    {
        $this->validate();

        if (isset($this->m->id))
        {
            $this->m->save();
            session()->flash('message', 'Registro actualizado con exito');
        }
        else
        {
            Orden::create([
                'id_usuario' => $this->l['id_usuario'],
                'id_platillo' => $this->l['id_platillo'],
                'id_estado' => $this->l['id_estado'],
                'cantidad' => $this->l['cantidad'],
                'adicionales' => $this->l['adicionales'],
            ]);
            session()->flash('message', 'Registro guardado con exito');
        }

        $this->confirmingRecordAddM = false;
    }

    // Miércoles
    public function confirmRecordAddK()
    {
        $this->reset(['k']);
        $this->confirmingRecordAddK = true;
    }

    public function saveRecordK()
    {
        $this->validate();

        if (isset($this->k->id))
        {
            $this->k->save();
            session()->flash('message', 'Registro actualizado con exito');
        }
        else
        {
            Orden::create([
                'id_usuario' => $this->l['id_usuario'],
                'id_platillo' => $this->l['id_platillo'],
                'id_estado' => $this->l['id_estado'],
                'cantidad' => $this->l['cantidad'],
                'adicionales' => $this->l['adicionales'],
            ]);
            session()->flash('message', 'Registro guardado con exito');
        }

        $this->confirmingRecordAddK = false;
    }

    // Jueves
    public function confirmRecordAddJ()
    {
        $this->reset(['j']);
        $this->confirmingRecordAddJ = true;
    }

    public function saveRecordJ()
    {
        $this->validate();

        if (isset($this->j->id))
        {
            $this->j->save();
            session()->flash('message', 'Registro actualizado con exito');
        }
        else
        {
            Orden::create([
                'id_usuario' => $this->l['id_usuario'],
                'id_platillo' => $this->l['id_platillo'],
                'id_estado' => $this->l['id_estado'],
                'cantidad' => $this->l['cantidad'],
                'adicionales' => $this->l['adicionales'],
            ]);
            session()->flash('message', 'Registro guardado con exito');
        }

        $this->confirmingRecordAddJ = false;
    }

    // Viernes
    public function confirmRecordAddV()
    {
        $this->reset(['v']);
        $this->confirmingRecordAddV = true;
    }

    public function saveRecordV()
    {
        $this->validate();

        if (isset($this->v->id))
        {
            $this->v->save();
            session()->flash('message', 'Registro actualizado con exito');
        }
        else
        {
            Orden::create([
                'id_usuario' => $this->l['id_usuario'],
                'id_platillo' => $this->l['id_platillo'],
                'id_estado' => $this->l['id_estado'],
                'cantidad' => $this->l['cantidad'],
                'adicionales' => $this->l['adicionales'],
            ]);
            session()->flash('message', 'Registro guardado con exito');
        }

        $this->confirmingRecordAddV = false;
    }

    // Sábado
    public function confirmRecordAddS()
    {
        $this->reset(['s']);
        $this->confirmingRecordAddS = true;
    }

    public function saveRecordS()
    {
        $this->validate();

        if (isset($this->s->id))
        {
            $this->s->save();
            session()->flash('message', 'Registro actualizado con exito');
        }
        else
        {
            Orden::create([
                'id_usuario' => $this->l['id_usuario'],
                'id_platillo' => $this->l['id_platillo'],
                'id_estado' => $this->l['id_estado'],
                'cantidad' => $this->l['cantidad'],
                'adicionales' => $this->l['adicionales'],
            ]);
            session()->flash('message', 'Registro guardado con exito');
        }

        $this->confirmingRecordAddS = false;
    }

    // Domingo
    public function confirmRecordAddD()
    {
        $this->reset(['d']);
        $this->confirmingRecordAddD = true;
    }

    public function saveRecordD()
    {
        $this->validate();

        if (isset($this->d->id))
        {
            $this->d->save();
            session()->flash('message', 'Registro actualizado con exito');
        }
        else
        {
            Orden::create([
                'id_usuario' => $this->l['id_usuario'],
                'id_platillo' => $this->l['id_platillo'],
                'id_estado' => $this->l['id_estado'],
                'cantidad' => $this->l['cantidad'],
                'adicionales' => $this->l['adicionales'],
            ]);
            session()->flash('message', 'Registro guardado con exito');
        }

        $this->confirmingRecordAddD = false;
    }

    // Otros
    public function confirmRecordAddO()
    {
        $this->reset(['o']);
        $this->confirmingRecordAddO = true;
    }

    public function saveRecordO()
    {
        $this->validate();

        if (isset($this->o->id))
        {
            $this->o->save();
            session()->flash('message', 'Registro actualizado con exito');
        }
        else
        {
            Orden::create([
                'id_usuario' => $this->l['id_usuario'],
                'id_platillo' => $this->l['id_platillo'],
                'id_estado' => $this->l['id_estado'],
                'cantidad' => $this->l['cantidad'],
                'adicionales' => $this->l['adicionales'],
            ]);
            session()->flash('message', 'Registro guardado con exito');
        }

        $this->confirmingRecordAddO = false;
    }
}
