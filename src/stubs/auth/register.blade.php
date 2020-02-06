@extends('layouts.app', [
    'title' => 'Register'
])

@section('content')


    <div class="govuk-grid-row">
        <div class="govuk-grid-column-two-thirds">

            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @csrf
                <fieldset class="govuk-fieldset">
                    <legend class="govuk-fieldset__legend govuk-fieldset__legend--xl">
                        <h1 class="govuk-fieldset__heading">
                            {{ __('Register') }}
                        </h1>
                    </legend>

                    <div class="govuk-form-group @error('name') govuk-form-group--error @enderror">
                        @error('name')
                        <span id="password" class="govuk-error-message">
                            <span class="govuk-visually-hidden">Error:</span> {{ $message }}
                        </span>
                        @enderror
                        <label for="name" class="govuk-label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="govuk-input" name="name" value="{{ old('name') }}" required autofocus>
                    </div>

                    <div class="govuk-form-group @error('email') govuk-form-group--error @enderror">
                        @error('email')
                        <span id="password" class="govuk-error-message">
                            <span class="govuk-visually-hidden">Error:</span> {{ $message }}
                        </span>
                        @endif
                        <label for="email" class="govuk-label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="govuk-input" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="govuk-form-group @error('password') govuk-form-group--error @enderror">
                        @error('password')
                        <span id="password" class="govuk-error-message">
                            <span class="govuk-visually-hidden">Error:</span> {{ $message }}
                        </span>
                        @endif

                        <label for="password" class="govuk-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="govuk-input" name="password" required>
                    </div>

                    <div class="govuk-form-group">
                        <label for="password-confirm" class="govuk-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="govuk-input" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="govuk-button">
                        {{ __('Register') }}
                    </button>

                </fieldset>
            </form>
        </div>
    </div>

@endsection
