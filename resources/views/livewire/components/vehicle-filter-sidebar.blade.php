<form class="w-full max-w-80 max-h-screen bg-base-100 shadow overflow-y-scroll pt-16">
    <div class="flex flex-col p-4">
        <label class="input input-bordered input-sm flex items-center gap-2">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" class="grow" placeholder="Pesquisar" wire:model="filter.term"/>
        </label>

        <div>
            <label class="label">Marca</label>
            <select class="select select-bordered select-sm w-full max-w-xs" wire:model="filter.brand">
                <option disabled selected value="null">Selecione...</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand }}">{{ $brand }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="label">Ano</label>

            <div class="flex gap-2">
                {{-- TODO: Input com type text e máscara para ano --}}
                <input class="input input-bordered input-sm w-full max-w-xs" type="number" placeholder="De"
                    wire:model="filter.year.from"/>
                <input class="input input-bordered input-sm w-full max-w-xs" type="number" placeholder="Até"
                    wire:model="filter.year.to"/>
            </div>
        </div>

        <div>
            <label class="label">Preço</label>

            <div class="flex gap-2">
                {{-- TODO: Criar máscara para currency --}}
                <input class="input input-bordered input-sm w-full max-w-xs" type="text" placeholder="De"
                    wire:model="filter.price.from"/>
                <input class="input input-bordered input-sm w-full max-w-xs" type="text" placeholder="Até"
                    wire:model="filter.price.from"/>
            </div>
        </div>

        <div>
            <label class="label">Quilometragem</label>

            <div class="flex gap-2">
                {{-- TODO: Input com type text e máscara numeral --}}
                <input class="input input-bordered input-sm w-full max-w-xs" type="number" placeholder="De"
                    wire:model="filter.mileage.from"/>
                <input class="input input-bordered input-sm w-full max-w-xs" type="number" placeholder="Até"
                    wire:model="filter.mileage.from"/>
            </div>
        </div>

        <div>
            <label class="label">Câmbio</label>
            <select class="select select-bordered select-sm w-full max-w-xs" wire:model="filter.transmission">
                <option disabled selected value="null">Selecione...</option>
                @foreach($transmissions as $transmission)
                    <option value="{{ $transmission }}">{{ $transmission }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="label">Tipo de Combustível</label>
            <select class="select select-bordered select-sm w-full max-w-xs" wire:model="filter.fuel">
                <option disabled selected value="null">Selecione...</option>
                @foreach($fuels as $fuel)
                    <option value="{{ $fuel }}">{{ $fuel }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="label">Cor</label>
            <select class="select select-bordered select-sm w-full max-w-xs" wire:model="filter.color">
                <option disabled selected value="null">Selecione...</option>
                @foreach($colors as $color)
                    <option value="{{ $color }}">{{ $color }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="label">Portas</label>
            <div class="join">
                <input class="join-item btn btn-sm btn-primary btn-outline" type="radio" name="options" value="2"
                    aria-label="2" wire:model="filter.doors_qtt"/>
                <input class="join-item btn btn-sm btn-primary btn-outline" type="radio" name="options" value="3"
                    aria-label="3" wire:model="filter.doors_qtt"/>
                <input class="join-item btn btn-sm btn-primary btn-outline" type="radio" name="options" value="4"
                    aria-label="4" wire:model="filter.doors_qtt"/>
                <input class="join-item btn btn-sm btn-primary btn-outline" type="radio" name="options" value="5"
                    aria-label="5" wire:model="filter.doors_qtt"/>
            </div>
        </div>

        <div class="pb-12">
            <label class="label">Opcionais</label>
            <div class="w-full join join-vertical space-y-0.5">
                @foreach($optionals as $key => $optional)
                    <div class="cursor-pointer flex items-center gap-2">
                        <input id="optional_checkbox_{{$key}}" type="checkbox" value="{{$optional}}"
                            class="checkbox checkbox-sm" wire:model="filter.options"/>
                        <label for="optional_checkbox_{{$key}}" class=" cursor-pointer label-text text-sm">
                            {{ $optional }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="fixed w-full max-w-80 bg-base-100 bottom-0 shadow drop-shadow">
        <div class="w-full p-2 gap-2 grid grid-cols-2">
            <button class="w-full btn btn-sm btn-primary" wire:loading.attr="disabled" wire:click="filter.apply">
                Filtrar
            </button>
            <button class="w-full btn btn-sm btn-primary btn-outline" wire:loading.attr="disabled"
                wire:click="filter.clear">
                Limpar
            </button>
        </div>
    </div>
</form>
