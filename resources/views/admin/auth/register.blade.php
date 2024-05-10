<x-admin-layout>
        <section class="vh-125" style="background-color: #799984;">
            <div class="container py-2 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="{{ asset('storage/images/forest.jpg')  }}"
                                    alt="register form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-fle align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">
            
                                    <form method="POST" action="{{ route('admin.register') }}">
                                    @csrf
    
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <img src="{{ asset('storage/images/logo.png') }}" alt="Sustain Energy Image" class="me-3" style="width: 40px; height: 40px; border-radius: 50%;">
                                        <span class="h1 fw-bold mb-0">Admin Registration</span>
                                    </div>
                  
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" />
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" />
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" />
                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" />
                                        @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3 text-center">
                                        <button type="submit" class="btn btn-success w-100">Register</button>
                                        <div class="mt-3">
                                            <a href="{{ route('admin.login') }}" style="text-decoration: none;"><span class="text-success">Already registered? Login</span></a>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</x-admin-layout>