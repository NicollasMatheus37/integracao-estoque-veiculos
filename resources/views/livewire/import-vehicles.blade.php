<div class="w-full h-full bg-base-200 px-16 pt-24 space-y-4 overflow-y-auto">
    <div class="bg-base-100 rounded-lg px-4 pb-4 shadow">
        <div class="flex justify-between text-2xl bg-base-100 rounded-lg py-4">
            Importação de veículos
        </div>

        <div class="w-full py-4 grid grid-cols-6 gap-4">
            <label class="form-control col-span-full md:col-span-2">
                <select wire:model="supplierId" class="select select-sm select-bordered">
                    <option disabled selected value="null">Selecione o fornecedor</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
                <span class="label">
                    @error('supplierId')
                    <span class="-mt-2 label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </span>
            </label>

            <div class="flex col-span-full md:col-span-3">
                <label class="w-full form-control">
                    <input class="file-input file-input-bordered file-input-sm"
                        type="file" wire:model="file"
                    />
                    <div class="label">
                        @error('file')
                        <span class="-mt-2 label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </label>
                <span class="loading loading-spinner w-4" wire:loading></span>
            </div>

            <div class="md:col-span-1 col-span-full flex justify-end">
                <button class="btn btn-primary btn-sm" wire:loading.attr="disabled" type="button" wire:click="import">
                    <span class="loading loading-spinner" wire:loading wire:target="import"></span>
                    <i class="fa-solid fa-file-arrow-up text-lg" wire:loading.remove wire:target="import"></i>
                    <span>Importar</span>
                </button>
            </div>
        </div>
    </div>

    <div class="bg-base-100 rounded-lg px-4 pb-4 shadow">
        <table class="w-full table table-zebra">
            <thead>
            <tr>
                <th>Fornecedor</th>
                <th>Nome do arquivo</th>
                <th>Status</th>
                <th>Quantidade de itens</th>
                <th>Data da importação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($importLogs as $importLog)
                <tr>
                    <td>{{ $importLog->supplier->name }}</td>
                    <td>{{ $importLog->original_file_name }}</td>
                    <td>{{ $importLog->status }}</td>
                    <td>
                        <div class="w-1/2 justify-between flex gap-6">
                            <div class="tooltip" data-tip="Total de itens">
                                <span class="font-semibold">{{ $importLog->total_items }}</span>
                            </div>
                            <div class="tooltip" data-tip="Importados com sucesso">
                                <span class="text-success">{{ $importLog->processed_items }}</span>
                            </div>
                            <div class="tooltip" data-tip="Importados com falha">
                                <span class="text-error">{{ $importLog->error_items }}</span>
                            </div>
                        </div>
                    </td>
                    <td>{{ $importLog->created_at }}</td>
                </tr>
            @endforeach
            @if(count($importLogs) === 0)
                <tr>
                    <td colspan="20" class="text-center">Nenhum fornecedor encontrado.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
