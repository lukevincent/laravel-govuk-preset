@extends('layouts.app', [
    'title' => 'Confirm password'
])

@section('content')
    <div class="govuk-grid-row">
        <div class="govuk-grid-column-two-thirds">
            <form method="POST" action="{{ route('password.confirm') }}" aria-label="{{ __('Confirm password') }}">
                @csrf
                <fieldset class="govuk-fieldset">
                    <div class="govuk-form-group @error('password')govuk-form-group--error@enderror">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--xl">
                            <h1 class="govuk-fieldset__heading">
                                {{ __('Confirm Password') }}
                            </h1>
                            <p class="govuk-body">Please confirm your password before continuing</p>
                        </legend>

                        <label for="password" class="govuk-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="govuk-input @error('password')govuk-input--error@enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span id="password" class="govuk-error-message">
                                <span class="govuk-visually-hidden">Error:</span> {{ $message }}
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
