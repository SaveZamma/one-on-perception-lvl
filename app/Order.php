<?php

namespace App;

class Order
{
    public int $user_id = 0;
    public string $name = '';
    public string $payment = '';
    public \DateTime|null $date = null;
    public string $title = '';
    public string $shipping_code = '';
    public string $cart = '';
    public string $address = '';
    public int $status = 0;

    public function __construct(
        $user_id,
        $name,
        $payment,
        $date,
        $title,
        $shipping_code,
        $cart,
        $address,
        $status
    )
    {
        $this->user_id = $user_id;
        $this->name = $name;
        $this->payment = $payment;
        $this->date = $date;
        $this->title = $title;
        $this->shipping_code = $shipping_code;
        $this->cart = $cart;
        $this->address = $address;
        $this->status = $status;
    }
}
