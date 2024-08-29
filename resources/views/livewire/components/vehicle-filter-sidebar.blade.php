<div class="w-full max-w-80 max-h-screen bg-base-100 shadow overflow-y-scroll pt-16">
    <div class="flex flex-col p-4">
        <label class="input input-bordered input-sm flex items-center gap-2">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" class="grow" placeholder="Pesquisar" wire:model="$parent.filter.term"/>
        </label>

        <div>
            <label class="label">Fornecedor</label>
            <select class="select select-bordered select-sm w-full max-w-xs" wire:model="$parent.filter.supplier">
                <option selected value="null">Selecione...</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" wire:key="supplier_{{$supplier->id}}">
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="label">Marca</label>
            <select class="select select-bordered select-sm w-full max-w-xs" wire:model="$parent.filter.brand">
                <option selected value="null">Selecione...</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand }}" wire:key="brand_{{$brand}}">
                        {{ $brand }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="label">Ano</label>

            <div class="flex gap-2">
                {{-- TODO: Input com type text e máscara para ano --}}
                <input class="input input-bordered input-sm w-full max-w-xs" type="number" placeholder="De"
                    wire:model="$parent.filter.year.from"/>
                <input class="input input-bordered input-sm w-full max-w-xs" type="number" placeholder="Até"
                    wire:model="$parent.filter.year.to"/>
            </div>
        </div>

        <div>
            <label class="label">Preço</label>

            <div class="flex gap-2">
                {{-- TODO: Criar máscara para currency --}}
                <input class="input input-bordered input-sm w-full max-w-xs" type="text" placeholder="De"
                    wire:model="$parent.filter.price.from"/>
                <input class="input input-bordered input-sm w-full max-w-xs" type="text" placeholder="Até"
                    wire:model="$parent.filter.price.to"/>
            </div>
        </div>

        <div>
            <label class="label">Quilometragem</label>

            <div class="flex gap-2">
                {{-- TODO: Input com type text e máscara numeral --}}
                <input class="input input-bordered input-sm w-full max-w-xs" type="number" placeholder="De"
                    wire:model="$parent.filter.mileage.from"/>
                <input class="input input-bordered input-sm w-full max-w-xs" type="number" placeholder="Até"
                    wire:model="$parent.filter.mileage.to"/>
            </div>
        </div>

        <div>
            <label class="label">Câmbio</label>
            <select class="select select-bordered select-sm w-full max-w-xs" wire:model="$parent.filter.transmission">
                <option selected value="null">Selecione...</option>
                @foreach($transmissions as $transmission)
                    <option value="{{ $transmission }}" wire:key="transmission_{{$transmission->value}}">
                        {{ $transmission->description() }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="label">Tipo de Combustível</label>
            <select class="select select-bordered select-sm w-full max-w-xs" wire:model="$parent.filter.fuel">
                <option selected value="null">Selecione...</option>
                @foreach($fuels as $fuel)
                    <option value="{{ $fuel }}" wire:key="fuel_{{$fuel->value}}">
                        {{ $fuel->description() }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="label">Cor</label>
            <select class="select select-bordered select-sm w-full max-w-xs" wire:model="$parent.filter.color">
                <option selected value="null">Selecione...</option>
                @foreach($colors as $color)
                    <option value="{{ $color }}" wire:key="color_{{$color->value}}">
                        {{ $color->description() }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="label">Portas</label>
            <div class="join">
                <input class="join-item btn btn-sm btn-primary btn-outline" type="radio" name="options" value="2"
                    aria-label="2" wire:model="$parent.filter.doors_qtt"/>
                <input class="join-item btn btn-sm btn-primary btn-outline" type="radio" name="options" value="3"
                    aria-label="3" wire:model="$parent.filter.doors_qtt"/>
                <input class="join-item btn btn-sm btn-primary btn-outline" type="radio" name="options" value="4"
                    aria-label="4" wire:model="$parent.filter.doors_qtt"/>
                <input class="join-item btn btn-sm btn-primary btn-outline" type="radio" name="options" value="5"
                    aria-label="5" wire:model="$parent.filter.doors_qtt"/>
            </div>
        </div>

        <div class="pb-12">
            <label class="label">Opcionais</label>
            <div class="w-full join join-vertical space-y-0.5">
                @foreach($options as $option)
                    <div class="cursor-pointer flex items-center gap-2">
                        <input id="options_{{$option->value}}" type="checkbox" value="{{$option->description()}}"
                            class="checkbox checkbox-sm" wire:model="$parent.filter.options"/>

                        <label for="options_{{$option->value}}" class="cursor-pointer label-text text-sm">
                            {{ $option->description() }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="fixed w-full max-w-80 bg-base-100 bottom-0 shadow drop-shadow">
        <div class="w-full p-2 gap-2 grid grid-cols-2">
            <button class="w-full btn btn-sm btn-primary" wire:click="$dispatch('applyFilter')">
                Filtrar
            </button>
            <button class="w-full btn btn-sm btn-primary btn-outline" wire:click="$dispatch('clearFilter')">
                Limpar
            </button>
        </div>
    </div>
</div>
