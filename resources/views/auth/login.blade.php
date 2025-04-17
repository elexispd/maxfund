<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

<!--=========== breadcrumb Section End =========-->

@include('partials.header-login')
<section class="contact-page-wrap section-padding">
    <section class="about-style2-area card ">
        <div class="container">
                 <h3 class="card-header text-info" style="font-size: 2.5rem !important"> Access your account </h3>


                <form wire:login method="post" class="card-body" id="login">
                    @csrf

                    <div class="form-group">
                        <label>Email address: </label>
                        <input type="email" class="form-control" name="email" id="email" value='' placeholder="Email address">
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                    <label>Enter trading password: </label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        @error('password')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <br/>
                        <button name="submit" class="btn btn-info">Login</button>
                    </div>


                </form>
                <div class="card-footer">
                         <a href="{{route('register')}}">Don't have an account? Click here to register. </a> Forgot Password? <a href="{{route('password.request')}}"> Click here to recover password! </a>
                    </div>


          </div>
        </section>

</section>




</div>
@include('partials.footer-register')