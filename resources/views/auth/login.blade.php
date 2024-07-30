<x-guest-layout>
    <div class="d-flex justify-content-center align-items-md-center" style="height: 100dvh">
        <div class="card rounded-lg mt-5" style="max-width: 450px; width: 100%; height: fit-content">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-center gap-2 my-2">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" height="40">
                    <h4 class="m-0 text-center font-weight-light ">SMAN 1 MONTASIK</h4>
                </div>
            </div>
            <div class="card-body">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <p>Masuk dengan akun anda.</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="email"
                            placeholder="name@example.com" name="email" value="{{ old('email') }}" />
                        <label for="inputEmail">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                            type="password" placeholder="Password" name="password" />
                        <label for="inputPassword">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <div class="form-check">
                            <input class="form-check-input" id="inputRememberPassword" type="checkbox"
                                name="remember" />
                            <label class="form-check-label" for="inputRememberPassword">Ingat Saya</label>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Masuk
                            <i class="fas fa-fw fa-right-to-bracket ms-1"></i>
                        </button>
                    </div>
                </form>
            </div>
            @if (Route::has('password.request'))
                <div class="card-footer">
                    <a class="d-block my-2 text-center" href="{{ route('password.request') }}">Forgot Password?</a>
                </div>
            @endif
        </div>
    </div>
</x-guest-layout>
