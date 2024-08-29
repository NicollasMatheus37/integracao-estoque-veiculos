<div class="w-full max-h-screen flex bg-base-200">
    <livewire:components.vehicle-filter-sidebar :filter="$filter"/>
    <div class="w-full max-h-screen overflow-y-scroll overflow-x-clip p-8 pt-20">
        <div class="w-full grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-y-2 gap-x-4">
            <div class="flex justify-end col-span-full gap-4">
                <button class="btn btn-primary btn-sm" wire:click="export">
                    <span class="loading loading-spinner" wire:loading></span>
                    <i class="fa-solid fa-file-excel" wire:loading.remove></i>
                    Exportar
                </button>
            </div>

            @if(count($vehicles) === 0)
                <div class="col-span-full flex justify-center items-center">
                    <p class="text-2xl text-base-content-secondary">Nenhum veículo encontrado</p>
                </div>
            @endif

            @foreach($vehicles as $vehicle)
                <livewire:components.vehicle-card :vehicle="$vehicle" :key="$vehicle->id"/>
            @endforeach
        </div>
    </div>
</div>
