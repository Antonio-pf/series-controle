<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>
    <div class="container-fluid">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @method('POST') <!-- Adiciona essa linha para indicar o método POST -->
            <div class="row d-flex justify-content-center align-items-center my-5">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center ">

                            <div class="mb-md-3 mt-md-2 pb-3 ">
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-3">Please enter your login and password!</p>

                                <div class="form-outline form-white mb-3">
                                    <label class="form-label" for="typeEmailX">Email</label>
                                    <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email"/>

                                </div>

                                <div class="form-outline form-white mb-3">
                                    <label class="form-label" for="typePasswordX">Password</label>
                                    <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password"/>

                                </div>

                                <p class="small mb-3 pb-lg-1"><a class="text-white-50" href="#">Forgot password?</a></p>

                                <button class="btn btn-outline-light btn-lg px-4" type="submit">{{ __('Log in') }}</button>

                                <div class="d-flex justify-content-center text-center mt-3 pt-1">
                                    <a href="#" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#" class="text-white"><i class="fab fa-twitter fa-lg mx-2 px-1"></i></a>
                                    <a href="#" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>
                            </div>

                            <div>
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                   href="{{ route('register') }}">
                                </a>
                                <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-white-50 fw-bold">{{ __('Sign in...') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>



</x-guest-layout>
