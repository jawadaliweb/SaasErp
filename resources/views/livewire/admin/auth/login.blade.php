<div class="login-box">
<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="#" class="h1"><b>My</b>App</a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form wire:submit.prevent="login">
            <div class="input-group mb-3">
                <input type="email" wire:model.defer="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                </div>
            </div>
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror

            <div class="input-group mb-3">
                <input type="password" wire:model.defer="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text"><span class="bi bi-lock"></span></div>
                </div>
            </div>
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror

            <div class="row">
                <div class="col-8">
                    <div class="form-check">
                        <input type="checkbox" wire:model="remember" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
