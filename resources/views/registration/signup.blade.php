@include('registration_layout.header')
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                        <h5 class="mb-0">Register Account</h5>
                                        <p class="text-muted mt-2">Get your Urban Mart account now.</p>
                                        </div>

                                        <form class="mt-4 pt-2" action="{{ route('registerSave') }}" method="post">
                                            @csrf
                                            <div class="form-floating form-floating-custom mb-4">
                                                <input type="email" class="form-control" name="email" id="email">
                                                <label for="input-email">Email</label>
                                                @error('email')
                                                    <div class="text-danger"> {{ $message}}</div>
                                                @enderror
                                                <div class="form-floating-icon">
                                                    <i data-eva="email-outline"></i>
                                                </div>
                                            </div>
                                            <div class="form-floating form-floating-custom mb-4">
                                                
                                                <input type="text" class="form-control" name="name" id="username">
                                                <label for="input-username">Username</label>
                                                @error('name')
                                                    <div class="text-danger"> {{ $message}}</div>
                                                @enderror
                                                <div class="form-floating-icon">
                                                    <i data-eva="people-outline"></i>
                                                </div>
                                            </div>
                                            <div class="form-floating form-floating-custom mb-4">
                                                
                                                <input type="password" class="form-control" name="password" id="input-password">
                                                <label for="password">Password</label>
                                                @error('password')
                                                    <div class="text-danger"> {{ $message}}</div>
                                                @enderror
                                                <div class="form-floating-icon">
                                                    <i data-eva="lock-outline"></i>
                                                </div>
                                            </div>
                                            <div class="form-floating form-floating-custom mb-4">
                                                
                                                <input type="password" class="form-control" name="password_confirmation" id="input-confirm" >
                                                <label for="password-confirm">Confirm Password</label>
                                                @error('password_confirmation')
                                                    <div class="text-danger"> {{ $message}}</div>
                                                @enderror
                                                <div class="form-floating-icon">
                                                    <i data-eva="lock-outline"></i>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <p class="mb-0">By registering you agree to the Urban Mart <a href="#" class="text-primary">Terms of Use</a></p>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Register</button>
                                            </div>
                                        </form>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        <div class="mt-4 pt-3 text-center">
                                            <p class="text-muted mb-0">Already have an account ? 
                                                <a href="{{ route('login')}}" class="text-primary fw-semibold"> Login </a> 
                                            </p>
                                        </div>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">
                                            © <script>document.write(new Date().getFullYear())</script> 
                                            Urban Mart . Designed by TetraObject
                                        </p>
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
    
{{-- <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<script>
    $(document).ready(function(){
       $('#SubmitBtn').click(function(e)){
          e.preventDefault();
          var matched;
          var password = $('#input-password').val();
          var confirm_password = $('#input-confirm').val();
 
          matched = (password == confirm_password) true ? false;
          if (matched) {
            $('responsiveDiv').html('Passwords matched');
          }
          else{
             $('responsiveDiv').html('Passwords do not matched');
          }
       }
    });
 </script> --}}