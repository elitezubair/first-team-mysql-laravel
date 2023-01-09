<div>
    <div class="menual_login">
        <h3>Login with Username | Email</h3>
        <form wire:submit.prevent="submit_form">
            <input type="email" class="form-control" placeholder="Email" wire:model.defer="email">
            @error('email')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
            <input type="password" class="form-control" placeholder="Password" wire:model.defer="password">
            @error('password')<span class="error text-danger text-xs font-weight-lighter font-italic">{{ $message }}</span>@enderror
            <button type="submit" class="btn">
                Login
            </button>
        </form>
        <p>
            Don't have account? <a href="#" data-bs-toggle="modal" data-bs-target="#register_modal">sign up
                here</a>
        </p>
    </div>
</div>
