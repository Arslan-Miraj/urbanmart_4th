@include('registration_layout.header')
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <div class="avatar-lg mx-auto">
                                                <div class="avatar-title bg-light text-primary h1 rounded-circle">
                                                    <i class="fa-solid fa-user"></i>
                                                </div>
                                            </div>

                                            <div class="mt-4 pt-2">
                                                <h5>You are Logged Out</h5>
                                                <p class="text-muted font-size-15">Thank you for using <span class="fw-semibold text-dark">Urban Mart</span></p>
                                                <div class="mt-4">
                                                    <a href="{{ route('login')}}" class="btn btn-primary w-100 waves-effect waves-light">Sign In</a>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="mt-4 pt-3 text-center">
                                            <p class="text-muted mb-0">Don't have an account ? <a href="{{ route('signup')}}"
                                                class="text-primary fw-semibold"> Signup</a></p>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Urban Mart . Designed by <i class="mdi mdi-heart text-danger"></i> TetraObject</p>
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