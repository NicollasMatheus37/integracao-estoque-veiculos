<div class="w-screen h-screen flex justify-center items-center">
    <form wire:submit="login">
        <div class="w-full flex flex-col gap-y-4">
            <label class="w-96 input input-bordered flex items-center gap-2">
                <input type="email" class="grow" placeholder="Email" wire:model="form.email"/>
                <i class="fa-solid fa-envelope"></i>
            </label>
            @error('form.email')<span class="text-error text-xs -mt-3">{{ $message }}</span>
            @enderror

            <label class="input input-bordered flex items-center gap-2">
                <input type="password" class="grow" placeholder="Senha" wire:model="form.password"/>
                <i class="fa-solid fa-lock"></i>
            </label>
            @error('form.password')<span class="text-error text-xs -mt-3">{{ $message }}</span>
            @enderror

            <div class="flex justify-center pt-8">
                <button type="submit" class="w-40 btn btn-primary">Entrar</button>
            </div>
        </div>
    </form>
</div>
