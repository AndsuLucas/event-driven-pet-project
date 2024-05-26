<?php

namespace App\Events\NewProductCreated;

class NewProductNotificationPayload
{
    protected $keys = ['name', 'price', 'img'];

    protected string $name;

    protected string $price;

    protected string $img;

    public function __construct(array $productData)
    {
       $dataToFill = array_intersect_key($productData, array_flip($this->keys));

         foreach ($dataToFill as $key => $value) {
              $this->{$key} = $value;
         }
    }

    public function toEmail(): array
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'img' => $this->img,
        ];
    }
}
