@extends('layouts.app', [
    'title' => 'Confirm password'
])

@section('content')
    <div class="govuk-grid-row">
        <div class="govuk-grid-column-two-thirds">
            <form method="POST" action="{{ route('password.confirm') }}" aria-label="{{ __('Confirm password') }}">
                @csrf
                <fieldset class="govuk-fieldset">
                    <div class="govuk-form-group">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--xl">
                            <h1 class="govuk-fieldset__heading">
                                {{ __('Confirm Password. Please confirm your password before continuing.') }}
                            </h1>
                        </legend>
                    </div>

                    <div class="govuk-form-group">
                        <label for="password" class="govuk-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <button type="submit" class="govuk-button">
                        {{ __('Confirm password') }}
                    </button>

                            @if (Route::has('password.request'))
                                <a class="govuk-button" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                </fieldset>
            </form>
        </div>
    </div>
@endsection
