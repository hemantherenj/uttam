@props(['data'])
<div class="max-w-sm mx-auto bg-white rounded-xl shadow-md overflow-hidden">
    <a href="{{ route('detail', $data->id) }}" wire:navigate>
        <div class="h-60 w-60">

            @if ($data->image_one)
                <img class="h-full w-full object-cover" src="{{ asset('storage/' . $data->image_one) }}"
                    alt="{{ $data->id }}">
            @else
                <img class="h-full w-full object-cover"
                    src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Card Image">
            @endif

            {{-- <img class="h-full w-full object-cover" src="https://via.placeholder.com/400x300" alt="Card Image"> --}}
        </div>
        <div class="p-4">
            <h2 class="text-lg font-semibold">{{ $data->first_name }}</h2>
            <p class="text-gray-600 text-sm">{{ $data->first_name }}</p>
            <p class="text-gray-600 text-sm">{{ $data->profile_for }}</p>
            <p class="text-gray-600 text-sm">{{ $data->profile_for }}</p>
            <p class="text-gray-600 text-sm">{{ $data->profile_for }}</p>
            <p class="text-gray-600 text-sm">{{ $data->profile_for }}</p>
            <p class="text-gray-600 text-sm">{{ $data->profile_for }}</p>
            <p class="text-gray-600 text-sm">{{ $data->profile_for }}</p>
            <p class="text-gray-600 text-sm">{{ $data->profile_for }}</p>
            <p class="text-gray-600 text-sm">{{ $data->profile_for }}</p>
        </div>
    </a>
</div>
