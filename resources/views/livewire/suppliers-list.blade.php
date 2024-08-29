<div class="w-full h-full px-16 pt-24 bg-base-200 overflow-y-auto">
    <div class="bg-base-100 rounded-lg px-4 pb-4 shadow">
        <div class="flex justify-between text-2xl bg-base-100 rounded-lg py-4">
            <div>Lista de fornecedores</div>

            <button class="btn btn-primary btn-sm" type="button" onclick="create_supplier_modal.showModal()">
                <i class="fa-solid fa-plus text-lg"></i>
                <span>Adicionar</span>
            </button>

            <dialog id="create_supplier_modal" class="modal">
                <div class="modal-box">
                    <h3 class="text-lg font-bold">Criar fornecedor</h3>
                    <input type="text" placeholder="Qual o nome do novo fornecedor?"
                        class="w-full input input-bordered mt-4" wire:model="name"/>
                    <div class="modal-action">
                        <form method="dialog">
                            <button class="btn btn-success" wire:click="create">Criar</button>
                            <button class="btn">Close</button>
                        </form>
                    </div>
                </div>
            </dialog>
        </div>

        <table class="w-full table table-zebra">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Qtd importada</th>
                <th>Última importação</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="overflow-y-auto">
            @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->importedVehiclesCount }}</td>
                    <td>{{ $supplier->lastImportLog->created_at }}</td>
                    <td class="w-1">
                        <i
                            wire:click="delete({{ $supplier->id }})"
                            wire:confirm="Tem certeza que deseja excluir o fornecedor?"
                            class="fa-solid fa-trash w-6 h-6 text-error rounded-full flex justify-center items-center cursor-pointer hover:bg-base-200"
                        ></i>
                    </td>
                </tr>
            @endforeach
            @if(count($suppliers) === 0)
                <tr>
                    <td colspan="20" class="text-center">Nenhum fornecedor encontrado.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

    {{-- TODO: adicionar toasts --}}
    <div id="toast-created-supplier" class="hidden toast toast-end">
        <div class="alert alert-success">
            <span>Fornecedor criado com sucesso.</span>
        </div>
    </div>
</div>
