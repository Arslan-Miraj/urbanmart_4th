@include('registration_layout.header')

                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Welcome Back !</h5>
                                            <p class="text-muted mt-2">Sign in to continue to Urban Mart.</p>
                                        </div>
                                        <form class="mt-4 pt-2" action="{{ route('loginMatch')}}" method="post">
                                            @csrf
                                            <div class="form-floating form-floating-custom mb-4">
                                                <input type="email" class="form-control" id="email" name="email">
                                                <label for="input-username">Email</label>
                                                @error('email')
                                                    <div class="text-danger"> {{ $message}}</div>
                                                @enderror
                                                <div class="form-floating-icon">
                                                    <i data-eva="people-outline"></i>
                                                </div>
                                            </div>
    
                                            <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                                <input type="password" class="form-control pe-5" id="password-input" name="password">
                                                <label for="input-password">Password</label>
                                                @error('password')
                                                    <div class="text-danger"> {{ $message}}</div>
                                                @enderror
                                                <div class="form-floating-icon">
                                                    <i data-eva="lock-outline"></i>
                                                </div>
                                            </div>
    
                                            <div class="mb-3">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                            </div>

                                            <div class="mt-4 pt-3 text-center">
                                                <p class="text-muted mb-0">Doesn't have account ? 
                                                    <a href="{{ route('signup')}}" class="text-primary fw-semibold"> Sign Up </a> 
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Urban Mart   . Designed by<i class="mdi mdi-heart text-danger"></i> TetraObject</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('registration_layout.crousel')
@include('registration_layout.footer')


                