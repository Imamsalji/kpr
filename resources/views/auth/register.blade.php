@extends('layouts.loglayout', ['title' => 'Register'])
@section('content')
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="{{asset('assets/images/ditkuad.png')}}" alt="Image" class="img-fluid">
      </div>
      <div class="col-md-6 contents">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="mb-4">
            <h3>Register</h3>
            <p class="mb-4">Isilah data dengan baik dan benar.</p>
          </div>
          <form method="POST" action="{{ route('register') }}" class="theme-form">
              @csrf
                    <div class="form-group">
                      <label class="col-form-label" for="name">Name:</label>
                      <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" id="name" required autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label class="col-form-label" for="email">E-Mail:</label>
                      <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" id="email" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <select class="form-control" name="pangkat_id" id="pangkat_id" required>
                        <option disabled selected>Pilih Pangkat</option>
                        @foreach ($pangkats as $pangkat)
                            <option value="{{ $pangkat->id }}">{{ $pangkat->pangkat }}</option>
                        @endforeach
                        @error('pangkat_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </select>
                    </div>

                    <div class="form-group">
                      <label class="col-form-label" for="username">NRP:</label>
                      <input class="form-control @error('nrp') is-invalid @enderror" type="number" name="nrp" value="{{ old('nrp') }}" id="nrp" required>
                        @error('nrp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label class="col-form-label" for="password">Password:</label>
                      <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" autocomplete="new-password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group last mb-4">
                        <label class="col-form-label" for="password-confirm">Confirm Password:</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password-confirm" autocomplete="new-password" required>
                    </div>
                    <a href="{{ route('login') }}" class="btn btn-danger btn-sm" style="color: white; text-decoration: none; padding: 15px;" role="button">Back</a>
                    <button type="submit" class="btn btn-primary btn-sm" type="submit">Register</button>
            </form>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>
@endsection
