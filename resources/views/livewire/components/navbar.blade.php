<div class="absolute navbar h-16 px-4 bg-base-100 shadow drop-shadow" style="z-index: 99999">
    <div class="flex-1">
        <a href="/estoque" wire:navigate class="btn btn-ghost text-xl">
            <i class="fa-solid fa-car"></i>
            <span>Integração de estoque de veículos</span>
        </a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal">
            <li><a href="/estoque" wire:navigate>Estoque</a></li>

            <li><a href="/importar" wire:navigate>Importar</a></li>

            <li><a href="/fornecedores" wire:navigate>Fornecedores</a></li>

            <li wire:click="logout" class="hover:bg-transparent">
                <div class="hover:bg-transparent flex items-center">
                    <a class="btn btn-xs btn-neutral flex gap-2">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Sair
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
