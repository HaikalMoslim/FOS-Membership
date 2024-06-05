@extends('layouts.front')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mt-4">
                            <h3>Clothing Preferences</h3>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">Color Preference</label>
                                <div class="col-md-6">
                                    @foreach(['red', 'blue', 'orange', 'yellow', 'green', 'purple', 'white', 'black', 'grey', 'beige', 'brown', 'pink'] as $color)
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="color_preference[]" value="{{ $color }}"> {{ ucfirst($color) }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">Style Preference</label>
                                <div class="col-md-6">
                                    @foreach(['casual', 'formal', 'business', 'sporty', 'vintage', 'bohemian'] as $style)
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="style_preference[]" value="{{ $style }}"> {{ ucfirst($style) }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">Fit Preference</label>
                                <div class="col-md-6">
                                    @foreach(['slim', 'regular', 'loose'] as $fit)
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="fit_preference[]" value="{{ $fit }}"> {{ ucfirst($fit) }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">Pattern Preference</label>
                                <div class="col-md-6">
                                    @foreach(['stripes', 'checks', 'floral', 'solid', 'geometric'] as $pattern)
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="pattern_preference[]" value="{{ $pattern }}"> {{ ucfirst($pattern) }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">Gender Identity</label>
                                <div class="col-md-6">
                                    @foreach(['men', 'women', 'boy', 'girl'] as $gender)
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="{{ $gender }}"> {{ ucfirst($gender) }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">Clothing Type</label>
                                <div class="col-md-6">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="clothing_type[]" value="top"> Top
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="clothing_type[]" value="bottom"> Bottom
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
