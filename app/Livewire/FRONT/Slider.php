<?php

namespace App\Livewire\FRONT;

use Livewire\Component;

class Slider extends Component
{
    public $list = [];

    public function mount()
    {
        // Example list, aap DB se fetch bhi kar sakte ho
        $this->list = [
            ['id' => 1, 'name' => 'Product 1', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 100],
            ['id' => 2, 'name' => 'Product 2', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 150],
            ['id' => 3, 'name' => 'Product 3', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 200],
            ['id' => 4, 'name' => 'Product 4', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 250],
            ['id' => 5, 'name' => 'Product 4', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 250],
            ['id' => 6, 'name' => 'Product 4', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 250],
            ['id' => 7, 'name' => 'Product 4', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 250],
            ['id' => 8, 'name' => 'Product 4', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 250],
            ['id' => 9, 'name' => 'Product 4', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 250],
            ['id' => 10, 'name' => 'Product 4', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 250],
            ['id' => 11, 'name' => 'Product 4', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 250],
            ['id' => 12, 'name' => 'Product 4', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 250],
            ['id' => 13, 'name' => 'Product 4', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 250],
            ['id' => 14, 'name' => 'Product 4', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 250],
            ['id' => 15, 'name' => 'Product 4', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 250],
            ['id' => 16, 'name' => 'Product 4', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDjr9YH56keogxW7CW4YudMw8KKFRRjuMfnUxlaDOF6w&s&ec=73068123', 'price' => 250],
        ];
    }
    
    public function render()
    {
        return view('livewire.f-r-o-n-t.slider');
    }
}
