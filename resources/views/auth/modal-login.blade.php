



  {{-- Modal Login  --}}



<div wire.ignore.self class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

               <div class="d-flex flex-column text-center logoContainer mb-5" id="logoContainer">
                    <img src="{{asset('assets/images/motomart.png')}}"
               </div>

                <div class="form-title text-center mt-2">
                    <h4>Account login</h4>
                </div>
                @if(session('error'))
                                <div class="alert alert-danger">
                                {{ session('error') }}
                                </div>
                            @endif
                <div class="d-flex flex-column text-center">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        {{-- Email --}}
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" autofocus />

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror


                        </div>

                        {{-- Password --}}
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror




                        </div>
                        <button type="submit" class="btn btn-block btn-round btn-danger">Sign In</button>
                    </form>

                    <div class="text-left mt-2"><a href="{{ url('/password/reset') }}" id="forgotPassword" class="text-info">Forgot Password</a></div>
                    <div class="text-center text-muted delimiter">or use a social netwaork</div>
                    <div class="d-flex justify-content-center social-buttons">
                        <a type="button" href="/auth/google/redirect" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Google">

                                <i class="fab fa-google"></i>

                        </a>
                        <a type="button" href="/auth/github/redirect" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Github">
                            <i class="fab fa-github"></i>
                        </a>

                        <a type="button" href="/auth/facebook/redirect" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section">Don't have an account yet? <a href="#" id="switchToRegister" class="text-info">Sign Up</a>.</div>
            </div>

        </div>
    </div>
</div>











