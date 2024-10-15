<x-layout title="LoginPage">
    <div class="container-fluid">
        <div class="container">
            <div class="row vh-100 align-items-center justify-content-center">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5">
                    <div class="card text-center shadow rounded-4">
                        <div class="card-header p-3">
                            <div class="row text-center">
                                <div class="col-12">
                                    <h1 class="fs-5 fs-1-sm"><i class="bi bi-collection-fill text-primary fs-1 me-3 align-middle"></i>MGT Tools</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('login.submit') }}" method="post">
                                @csrf
                                <div class="container">
                                    <div class="row gap-3">
                                        <div class="col-12">
                                            <h5 class="fs-6">Login to your account.</h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="email" name="email" placeholder="Type your email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" value="{{ old('email') }}">
                                                <label for="email">Email</label>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
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
                                        <div class="col-12">
                                            <input type="submit" value="Login" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
