<?php

namespace App\Http\Livewire\Frontend\PropertyDetail;

use Illuminate\Support\Facades\Config;
use Livewire\Component;
use Mortgage\Facades\Annuity;
class MortgageCalculator extends Component
{

    public function mount()
    {

        // Config::set('mortgage.loanTerm', 5);
        // Config::set('mortgage.loanAmount', 5);
        // Config::set('mortgage.interestRate', 5);

        // dd(Annuity::showRepaymentSchedule() );
        // dd(Annuity::getPercentAmount());
        // dd(Annuity::getLoanTerm());
    }
    public function render()
    {
        return view('livewire.frontend.property-detail.mortgage-calculator');
    }
}
