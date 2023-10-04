<?php


namespace App\Http\Livewire\Site;

use App\Models\Card;
use App\Models\IP;
use App\Models\Order;
use Livewire\Component;

class Steps extends Component
{
    public $cards;

    public $title;

    public $card_id;

    public $order;

    public $visitedBefore;

    public function mount()
    {
        $this->cards = Card::all();

        $this->title = __('Order Image');

        $this->order = Order::create();

        try {
            $ip = IP::where('ip', request()->ip())->first();

            $this->visitedBefore = $ip->visited_step_page;

            $ip->update([
                'visited_step_page' => true
            ]);

        } catch (\Throwable $th) {
            $this->visitedBefore = false;
        }
    }

    public function updatedCardId($value)
    {
        $this->dispatchBrowserEvent('change-card', Card::find($value));;

        $this->order->update([
            'card_id' => $value
        ]);
    }

    public function render()
    {
        return view('livewire.site.steps');
    }
}
