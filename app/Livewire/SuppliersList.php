<?php

namespace App\Livewire;

use App\Models\Supplier;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SuppliersList extends Component
{
    #[Validate('required|string')]
    public string $name = '';

    // TODO: Implementar update
    public function create()
    {
        $this->validate();
        Supplier::create([
            'name' => $this->name,
        ]);

        $this->js("alert('Fornecedor criado!')");
        $this->name = '';
    }

    // TODO: Implementar restore
    public function delete(int $id)
    {
        Supplier::destroy($id);

        $this->dispatch('supplier-deleted');
    }

    public function render()
    {
        return view('livewire.suppliers-list', [
            'suppliers' => Supplier::all(),
        ]);
    }
}
