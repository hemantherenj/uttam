<div>
    <x-front.banner />
    {{-- <x-front.about /> --}}



    <section class="py-10">
        <div class="container mx-auto">
            <h2 class="text-[32px] p-5">Bride</h2>
            <div class="grid grid-cols-4 gap-2">
                @foreach ($female as $data)
                    <x-front.card :data="$data" />
                @endforeach
            </div>
            <button class="btn btn-primary items-center">More profiles</button>
        </div>
    </section>

    <section class="py-10">
        <div class="container mx-auto">
            <h2 class="text-[32px] p-5">Groom</h2>
            <div class="grid grid-cols-3 gap-5">
                @foreach ($male as $data)
                    <x-front.card :data="$data" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- <section class="min-h-screen bg-gray-100 py-10">
        <livewire:f-r-o-n-t.slider />
    </section> --}}
    {{-- <section id="contact" class="min-h-screen"></section> --}}

</div>
