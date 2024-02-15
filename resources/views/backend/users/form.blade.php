<?php
/**
 * Created by PhpStorm.
 * User: Dagmar Mpheio
 * Date: 10/27/2020
 * Time: 2:57 PM
 */
?>

@csrf
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                {!! Form::label('name', 'Nome', ['class' => 'card-title mb-0', 'for' => 'name']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome', 'autofocus', 'required']) !!}

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                {!! Form::label('email', 'Email', ['class' => 'card-title mb-0', 'for' => 'email']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) !!}

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>


            <div class="card-header">
                {!! Form::label('phone', 'phone', ['class' => 'card-title mb-0', 'for' => 'phone']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('phone') ? ' has-error' : '' }} has-feedback">
                {!! Form::tel('phone', null, ['class' => 'form-control', 'placeholder' => 'phone', 'required']) !!}

                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                {!! Form::label('password', 'Password', [
                    'for' => 'password',
                    'class' => 'card-title mb-0',
                    'for' => 'password',
                ]) !!}<font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                {!! Form::input('password', 'password', $user->exists ? $user->password : null, [
                    'id' => 'password',
                    'class' => 'form-control',
                    'autocomplete' => 'new-password',
                    'placeholder' => 'Password',
                    'required' => 'required',
                ]) !!}

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                {!! Form::label('password_confirmation', 'Confirmar a Password', [
                    'class' => 'card-title mb-0',
                    'for' => 'password_confirmation',
                ]) !!}<font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                {!! Form::input('password', 'password_confirmation', $user->exists ? $user->password : null, [
                    'id' => 'password_confirmation',
                    'class' => 'form-control',
                    'autocomplete' => 'new-password',
                    'placeholder' => 'Password',
                    'required' => 'required',
                ]) !!}


                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

        </div>

    </div>

    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                {!! Form::label('bio', 'Biografia', ['class' => 'card-title mb-0', 'for' => 'bio']) !!}
            </div>
            <div class="card-body excerpt {{ $errors->has('genero') ? ' has-error' : '' }} has-feedback">
                {!! Form::textarea('bio', null, ['class' => 'form-control', 'rows' => '2']) !!}

                @if ($errors->has('bio'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bio') }}</strong>
                    </span>
                @endif
            </div>


        </div>

        <button class="btn btn-primary-green" type="submit"><i class="align-middle" data-feather="save"></i>
            <span class="align-middle">Guardar</span></button>
        <a class="btn btn-dark text-white" href="{{ route('backend.users.index') }}"><i class="align-middle"
                data-feather="slash"></i> <span class="align-middle">Cancelar</span></a>

    </div>
</div>
