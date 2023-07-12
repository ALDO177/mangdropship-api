<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProdukFactory extends Factory
{

    public function definition()
    {
        return [
            'product_name'   => Str::ucfirst($this->faker->words(random_int(5, 10), true)),
            'SKU'            => Str::upper($this->faker->bothify('?????-#######')),
            'regular_price'  => $this->faker->numberBetween(10000, 500000),
            'discount_price' => ($this->faker->numberBetween(10000, 500000) / 0.10),
            'quantity'       => $this->faker->numberBetween(0, 100),
            'short_description' => $this->faker->text(40),
            'product_description' => '
            ## Tech
                Dillinger uses a number of open source projects to work properly:
                - [AngularJS] - HTML enhanced for web apps!
                - [Ace Editor] - awesome web-based text editor
                - [markdown-it] - Markdown parser done right. Fast and easy to extend.
                - [Twitter Bootstrap] - great UI boilerplate for modern web apps
                - [node.js] - evented I/O for the backend
                - [Express] - fast node.js network app framework [@tjholowaychuk]
                - [Gulp] - the streaming build system
                - [Breakdance](https://breakdance.github.io/breakdance/) - HTML
                to Markdown converter
                - [jQuery] - duh
                
                And of course Dillinger itself is open source with a [public repository][dill]
                on GitHub.
            ',
            'product_weight' => $this->faker->numberBetween(5, 100),
            'published' => $this->faker->boolean()
        ];
    }
}
