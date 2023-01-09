<?php

namespace App\Http\Livewire\Frontend\PropertyDetail;

use App\Models\PropertyEnquiry;
use App\Models\PropertyVistRequest;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Livewire\Component;

class PropertyVisitComponent extends Component
{
    public $property_id, $szAddress_nm, $szMLS_no, $scheduled_date, $scheduled_time, $first_name, $last_name, $email, $phone, $tour_type='Video-Tour', $description, $tnc = false;
    public $dateRangeAttrition;

    public function emitNotifications($message, $msgType)
    {
        $this->dispatchBrowserEvent('toast-notification-component', ['type' => $msgType,  'message' => $message]);
    }

    protected $rules = [
        'email' => 'required|email',
        'phone' => 'required|numeric|digits:10',
        'first_name' => 'required|string|alpha_dash',
        'last_name' => 'required|string|alpha_dash',
        'tour_type' => 'required',
        'description' => 'required',
        'tnc' => 'boolean',
        'scheduled_time' => 'required',
        'scheduled_date' => 'required',
    ];

    protected $messages = [
        'type.required' => 'Visiter type format is not valid.',
    ];

    public function setScheduledDate($value)
    {
        $this->scheduled_date=$value;
    }
    public function dateRangeGenerator()
    {
        $period = CarbonPeriod::create(Carbon::now(), Carbon::now()->addDays(7));
        return  $period->toArray();
    }

    public function submit_visiting_form()
    {
        $this->validate();
        if ($this->tnc == false) {
            return   $this->addError('tnc', 'Terms & Condition cannot be empty.');;
        }

        $check =  PropertyVistRequest::where('email', $this->email)->where('property_id', $this->property_id)->where('eq_status', 'open')->first();
        if ($check) {
            return $this->emitNotifications('A previous request already open, we will get back to you as soon as possible.', 'success');
        }
        $store_data =  new PropertyVistRequest();
        $store_data->property_id = $this->property_id;
        $store_data->szAddress_nm = $this->szAddress_nm;
        $store_data->szMLS_no = $this->szMLS_no;
        $store_data->first_name = $this->first_name;
        $store_data->last_name = $this->last_name;
        $store_data->email = $this->email;
        $store_data->phone = $this->phone;
        $store_data->tour_type = $this->tour_type;
        $store_data->description = $this->description;
        $store_data->tnc = $this->tnc;
        $store_data->scheduled_date = $this->scheduled_date;
        $store_data->scheduled_time = $this->scheduled_time;

        try {
            $store_data->save();
            return $this->emitNotifications('request submitted successfully', 'success');
        } catch (\Throwable $th) {
            return $this->emitNotifications($th->getMessage(), 'error');
        }
    }

    public function render()
    {
       $dateRange =  $this->dateRangeGenerator();
        return view('livewire.frontend.property-detail.property-visit-component', compact('dateRange'));
    }
}
