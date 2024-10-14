<x-layout title="LoginPage">
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex flex-row justify-content-center vh-100 align-items-center">
                <div class="col-3">
                    <form action="{{ route('login.submit') }}" method="POST"
                        class="form-control border border-0 shadow rounded-4 p-5">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <h1 class="text-center fs-2"><i class="bi bi-collection-fill me-3 text-primary"></i>Login to MGT
                                </h1>
                                <p class="text-center">Selamat datang di mgt tools.</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="email" name="email" placeholder="Type your email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        value="{{ old('email') }}">
                                    <label for="email">Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating has-validation">
                                    <input type="password" name="password" id="password"
                                        placeholder="Type your password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        value="{{ old('password') }}">
                                    <label class="floating-input" for="password">Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <input type="submit" value="Login" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
