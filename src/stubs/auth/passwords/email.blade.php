@extends('layouts.app', [
    'title' => 'Reset password'
])

@section('content')
    <div class="govuk-grid-row">
        <div class="govuk-grid-column-two-thirds">

            @if (session('status'))
                <div class="govuk-warning-text">
                    <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
                    <strong class="govuk-warning-text__text">
                        {{ session('status') }}
                    </strong>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                @csrf
                <fieldset class="govuk-fieldset">
                    <div class="govuk-form-group @error('email') govuk-form-group--error  @enderror">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--xl">
                            <h1 class="govuk-fieldset__heading">
                                {{ __('Reset Password') }}
                            </h1>
                        </legend>

                        @error('email')
                        <span id="email" class="govuk-error-message">
                        <span class="govuk-visually-hidden">Error:</span> {{ $message }}
                    </span>
                        @enderror

                        <label for="email" class="govuk-label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="govuk-input" name="email" value="{{ old('email') }}" required>

                    </div>

                    <button type="submit" class="govuk-button">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
