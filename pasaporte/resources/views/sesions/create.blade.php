@extends('layouts.app')

@section('content')

<div class="card-header">
    {{ __('Create') }}
</div>

<div class="card-body">
    <form method="POST" action="{{route('sesions.store', $user)}}">
        @csrf

        <div class="form-group row">
            <label for="clase_id" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>
            <div class="col-md-6">
                <select id="clase_id" type="text" class="custom-select @error('clase_id') is-invalid error-input @enderror" name="clase_id" value="{{ old('clase_id') }}" required autocomplete="clase_id" autofocus>
                    @foreach($clases_optgroup as $optgroup)
                    <optgroup label="{{ $optgroup->clase_nombre }}">
                        @foreach($clases as $clase)
                        @if($clase->clase_nombre == $optgroup->clase_nombre)
                        <option value="{{$clase->id}}">
                            {{$clase->clase_nombre}}, {{$clase->coach->coach_nombre}}, Inicio: {{ \Carbon\Carbon::parse($clase->clase_hora_inicio)->format('g:i A')}}
                        </option>
                        @endif
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>
                @error('clase_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Accept') }}
                </button>
            </div>
        </div>

    </form>
</div>

@endsection