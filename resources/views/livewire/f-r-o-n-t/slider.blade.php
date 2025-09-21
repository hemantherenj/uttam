<div>
    <div x-data="{ current: 0 }" class="relative w-full max-w-4xl mx-auto">
        <!-- list -->
        <div class="overflow-hidden rounded-lg">
            <div class="flex transition-transform duration-500" :style="`transform: translateX(-${current * 100}%)`">
                @foreach ($list as $data)
                    <div class="min-w-full flex-shrink-0 p-4">
                        <div class="bg-white rounded shadow p-4 text-center">
                            <img src="{{ $data['image'] }}" alt="{{ $data['name'] }}" class="mx-auto mb-2">
                            <h2 class="font-bold">{{ $data['name'] }}</h2>
                            <p class="text-gray-600">${{ $data['price'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Buttons -->
        <button @click="current = (current === 0) ? {{ count($list) - 1 }} : current - 1"
            class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 text-white px-4 py-2 rounded">
            Prev
        </button>
        <button @click="current = (current === {{ count($list) - 1 }}) ? 0 : current + 1"
            class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 text-white px-4 py-2 rounded">
            Next
        </button>
    </div>

    {{-- ///////////////////////////////////////////////////////////////////// --}}


    <div 
    x-data="{
        current: 0, 
        total: {{ count($list) }},
        init() {
            setInterval(() => {
                this.current = (this.current + 1) % this.total;
            }, 3000); // Auto-play every 3 sec
        }
    }" 
    class="relative w-full max-w-4xl mx-auto"
>
    <!-- Slider Wrapper -->
    <div class="overflow-hidden rounded-lg">
        <div class="flex transition-transform duration-500"
             :style="`transform: translateX(-${current * 100}%)`">
            @foreach($list as $product)
                <div class="min-w-full flex-shrink-0 p-6">
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
                        <img src="{{ $product['image'] }}" 
                             alt="{{ $product['name'] }}" 
                             class="mx-auto mb-4 rounded-lg">
                        <h2 class="text-xl font-bold">{{ $product['name'] }}</h2>
                        <p class="text-gray-600 text-lg">${{ $product['price'] }}</p>
                        <button class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                            Add to Cart
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Prev Button -->
    <button 
        @click="current = (current === 0) ? total - 1 : current - 1"
        class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full shadow">
        ‹
    </button>

    <!-- Next Button -->
    <button 
        @click="current = (current === total - 1) ? 0 : current + 1"
        class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full shadow">
        ›
    </button>

    <!-- Dots Navigation -->
    <div class="flex justify-center mt-4 space-x-2">
        <template x-for="(dot, index) in total" :key="index">
            <button 
                class="w-3 h-3 rounded-full"
                :class="current === index ? 'bg-indigo-600' : 'bg-gray-400'"
                @click="current = index"
            ></button>
        </template>
    </div>
</div>


</div>
