<?php

namespace App\Livewire\FRONT;

use Illuminate\Support\Facades\Hash;
use App\Models\Registration;
use Livewire\WithFileUploads; // Import the trait
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Form extends Component
{
    use WithFileUploads; // Enable file uploads

    // A flag to keep track of the old image during an update

    public $registration;

    public $oldImage;

    #[Validate('image|max:1024')] // 1MB Max
    public $image_one;

    #[Validate('image|max:1024')] // 1MB Max
    public $image_two;

    #[Validate('image|max:1024')] // 1MB Max
    public $image_three;

    #[Validate('image|max:1024')] // 1MB Max
    public $image_four;

    #[Validate('image|max:1024')] // 1MB Max
    public $image_five;

    public $id,
        $about,
        $first_name,
        $last_name,
        $gender,
        $email,
        $mobile,
        $dob,
        $height,
        $weight,
        $mother_tongue,
        $marital_status,
        $body_type,
        $complexion,
        $physical_status,
        $eating_habits,
        $drinking_habits,
        $smoking_habits,
        $education,
        $address,
        $city,
        $state,
        $pincode,
        $country;


    public function mount()
    {
        // $this->registration = Registration::all();

        $data = auth('front')->user();
        // {{ auth('front')->user()->profile_for }}

        $this->id = $data->id;
        $this->about = $data->about;
        $this->first_name = $data->first_name;
        $this->last_name = $data->last_name;
        $this->gender = $data->gender;
        $this->email = $data->email;
        $this->mobile = $data->mobile;
        $this->dob = $data->dob;
        $this->height = $data->height;
        $this->weight = $data->weight;
        $this->mother_tongue = $data->mother_tongue;
        $this->marital_status = $data->marital_status;
        $this->body_type = $data->body_type;
        $this->complexion = $data->complexion;
        $this->physical_status = $data->physical_status;
        $this->eating_habits = $data->eating_habits;
        $this->drinking_habits = $data->drinking_habits;
        $this->smoking_habits = $data->smoking_habits;
        $this->education = $data->education;
        $this->address = $data->address;
        $this->city = $data->city;
        $this->state = $data->state;
        $this->pincode = $data->pincode;
        $this->country = $data->country;
    }

    public function render()
    {
        return view('livewire.f-r-o-n-t.form');
    }

    public function update()
    {
        $this->validate([
            'about' => "required",
            'first_name' => "required",
            'last_name' => "required",
            'gender' => "required",
            'email' => "required",
            'mobile' => "required",
            'dob' => "required",
            'height' => "required",
            'weight' => "required",
            'mother_tongue' => "required",
            'marital_status' => "required",
            'body_type' => "required",
            'complexion' => "required",
            'physical_status' => "required",
            'eating_habits' => "required",
            'drinking_habits' => "required",
            'smoking_habits' => "required",
            'education' => "required",
            'address' => "required",
            'city' => "required",
            'state' => "required",
            'pincode' => "required",
            'country' => "required",
        ]);

        $user = auth('front')->user();

        if ($this->image_one) {
            // 1. Delete the old image file if it exists
            if ($user->image_one) {
                Storage::disk('public')->delete($user->image_one);
            }

            // 2. Store the new image and get its path
            $imageOnePath = $this->image_one->store('profiles', 'public');
            $user->image_one = $imageOnePath;
        }



        // Check if a new image was uploaded
        if ($this->image_two) {
            // 1. Delete the old image file if it exists
            if ($user->image_two) {
                Storage::disk('public')->delete($user->image_two);
            }

            // 2. Store the new image and get its path
            $imagePath = $this->image_two->store('profiles', 'public');
            $user->image_two = $imagePath;
        }

        // Check if a new image was uploaded
        if ($this->image_three) {
            // 1. Delete the old image file if it exists
            if ($user->image_three) {
                Storage::disk('public')->delete($user->image_three);
            }

            // 2. Store the new image and get its path
            $imagePath = $this->image_three->store('profiles', 'public');
            $user->image_three = $imagePath;
        }

        // Check if a new image was uploaded
        if ($this->image_four) {
            // 1. Delete the old image file if it exists
            if ($user->image_four) {
                Storage::disk('public')->delete($user->image_four);
            }

            // 2. Store the new image and get its path
            $imagePath = $this->image_four->store('profiles', 'public');
            $user->image_four = $imagePath;
        }

        // Check if a new image was uploaded
        if ($this->image_five) {
            // 1. Delete the old image file if it exists
            if ($user->image_five) {
                Storage::disk('public')->delete($user->image_five);
            }

            // 2. Store the new image and get its path
            $imagePath = $this->image_five->store('profiles', 'public');
            $user->image_five = $imagePath;
        }



        $user->about = $this->about;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->gender = $this->gender;
        $user->email = $this->email;
        $user->mobile = $this->mobile;
        $user->dob = $this->dob;
        $user->height = $this->height;
        $user->weight = $this->weight;
        $user->mother_tongue = $this->mother_tongue;
        $user->marital_status = $this->marital_status;
        $user->body_type = $this->body_type;
        $user->complexion = $this->complexion;
        $user->physical_status = $this->physical_status;
        $user->eating_habits = $this->eating_habits;
        $user->drinking_habits = $this->drinking_habits;
        $user->smoking_habits = $this->smoking_habits;
        $user->education = $this->education;
        $user->address = $this->address;
        $user->city = $this->city;
        $user->state = $this->state;
        $user->pincode = $this->pincode;
        $user->country = $this->country;
        // $user->image_one = $imageOnePath;
        // $user->image_two = $imagePath;

        $user->save();

        session()->flash("success", "Account create successfully");
        $this->redirectRoute('profile', navigate: true);
    }
}

