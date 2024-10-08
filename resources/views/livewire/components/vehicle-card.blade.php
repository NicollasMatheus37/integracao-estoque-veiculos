<div class="card card-side w-full card-compact bg-base-100 shadow">
    <div
        class="flex justify-center items-center bg-primary text-primary-content p-6 px-10 rounded-l-2xl">
        <div class="text-8xl">
            <i class="fa-solid fa-car-rear text-center"></i>
            <p class="text-base text-center">{{$vehicle->color}}</p>
        </div>
    </div>
    <div class="card-body">
        <span class="absolute right-3 top-1 font-mono text-xs text-base-300">
            #{{$vehicle->register_id}}
        </span>
        <span class="absolute right-3 bottom-1 font-mono text-xs text-neutral">
            {{$vehicle->supplier_name}}
        </span>
        <span class="card-title">{{$vehicle->brand}} {{$vehicle->model}} - {{$vehicle->year}}</span>
        <span>
            {{$vehicle->version}}, {{$vehicle->transmission}}, {{$vehicle->fuel}}

            <span class="tooltip tooltip-bottom pl-1 text-xs" data-tip="{{$options}}">
                <span><i class="fa-solid fa-circle-question text-xs"></i></span>
            </span>
        </span>
        <span class="font-mono text-lg">R$ {{$vehicle->price}}</span>
        <span>{{$vehicle->mileage}} km</span>
    </div>
</div>
