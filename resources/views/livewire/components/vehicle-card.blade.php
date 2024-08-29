<div class="card card-side w-full card-compact bg-base-100 shadow drop-shadow">
    <div
        class="flex justify-center items-center bg-primary text-primary-content p-6 rounded-l-2xl">
        <figure class="text-8xl">
            <i class="fa-solid fa-car-rear"></i>
        </figure>
        <span class="absolute right-3 top-1 font-mono text-xs text-base-300">
            #{{$vehicle->register_id}}
        </span>
        <span class="absolute right-3 bottom-1 font-mono text-xs text-neutral">
            {{$vehicle->supplier_name}}
        </span>
    </div>
    <div class="card-body">
        <span class="card-title">{{$vehicle->brand}} {{$vehicle->model}} - {{$vehicle->year}}</span>
        <span>{{$vehicle->transmission}}, {{$vehicle->fuel}}</span>
        <span class="font-mono text-lg">R$ {{$vehicle->price}}</span>
        <span>{{$vehicle->mileage}} km</span>
    </div>
</div>
