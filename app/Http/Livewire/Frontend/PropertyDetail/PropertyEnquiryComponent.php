<?php

namespace App\Http\Livewire\Frontend\PropertyDetail;

use App\Models\PropertyEnquiry;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Livewire\Component;


class PropertyEnquiryComponent extends Component
{
    public $property_id, $szAddress_nm, $szMLS_no, $name, $email, $phone, $type, $description, $tnc = false;

    public function emitNotifications($message, $msgType)
    {
        $this->dispatchBrowserEvent('toast-notification-component', ['type' => $msgType,  'message' => $message]);
    }

    protected $rules = [
        'email' => 'required|email',
        'phone' => 'required|numeric|digits:10',
        'name' => 'required|string',
        'type' => 'required',
        'description' => 'required|string',
        'tnc' => 'boolean',
    ];

    protected $messages = [
        'type.required' => 'Visiter type format is not valid.',
    ];

    public function submit_enquiry_form()
    {
        $this->validate();
        if ($this->tnc == false) {
            return   $this->addError('tnc', 'Terms & Condition cannot be empty.');;
        }

        $check =  PropertyEnquiry::where('email', $this->email)->where('property_id', $this->property_id)->where('eq_status', 'open')->first();
        if ($check) {
            return $this->emitNotifications('A previous enquiry already open, we will get back to you as soon as possible.', 'success');
        }
        $store_data =  new PropertyEnquiry();
        $store_data->property_id = $this->property_id;
        $store_data->szAddress_nm = $this->szAddress_nm;
        $store_data->szMLS_no = $this->szMLS_no;
        $store_data->name = $this->name;
        $store_data->email = $this->email;
        $store_data->phone = $this->phone;
        $store_data->type = $this->type;
        $store_data->description = $this->description;
        $store_data->tnc = $this->tnc;

        try {
            $store_data->save();
            return $this->emitNotifications('Enquiry submitted successfully', 'success');
        } catch (\Throwable $th) {
            return $this->emitNotifications($th->getMessage(), 'error');
        }
    }
    public function render()
    {
        return view('livewire.frontend.property-detail.property-enquiry-component');
    }
}
