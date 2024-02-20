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
                {!! Form::label('type', 'Tipo de Serviço', ['class' => 'card-title mb-0', 'for' => 'type']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('type') ? ' has-error' : '' }} has-feedback">
                {!! Form::select('type', ['Vacina' => 'Vacina', 'Banho' => 'Banho', 'Cirurgia' => 'Cirurgia'], null, ['class' => 'form-control', 'placeholder' => 'Selecione o Tipo', 'required']) !!}


                @if ($errors->has('type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('type') }}</strong>
                    </span>
                @endif
            </div>

            <div class="card-header">
                {!! Form::label('animal_id', 'Animal', ['class' => 'card-title mb-0', 'for' => 'animal_id']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('animal_id') ? ' has-error' : '' }} has-feedback">
                {!! Form::select('animal_id', \App\Models\Animal::pluck('name','id'), null, ['class' => 'form-control', 'placeholder' => 'Selecione o Animal', 'required']) !!}

                @if ($errors->has('animal_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('animal_id') }}</strong>
                    </span>
                @endif
            </div>


            <div class="card-header">
                {!! Form::label('user_id', 'Usuário', ['class' => 'card-title mb-0', 'for' => 'user_id']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('user_id') ? ' has-error' : '' }} has-feedback">
                {!! Form::select('user_id', \App\Models\User::pluck('name','id'), null, ['class' => 'form-control', 'placeholder' => 'Selecione Usuário', 'required']) !!}

                @if ($errors->has('user_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user_id') }}</strong>
                    </span>
                @endif
            </div>

        </div>

        <div class="card">
            <div class="card-header">
                {!! Form::label('time', 'Hora', ['class' => 'card-title mb-0', 'for' => 'time']) !!}
            </div>

            <div class="card-body {{ $errors->has('time') ? ' has-error' : '' }} has-feedback">
                <div class="input-group date" id="timepicker" data-target-input="nearest">
                    <input type="text" name="time" class="form-control datetimepicker-input" data-target="#timepicker"/>
                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="align-middle" data-feather="clock"></i></div>
                    </div>
                </div>
                @if ($errors->has('time'))
                    <span class="help-block">
                        <strong>{{ $errors->first('time') }}</strong>
                    </span>
                @endif
            </div>
            
        </div>

    </div>

    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                {!! Form::label('date', 'Data', ['class' => 'card-title mb-0', 'for' => 'date']) !!}
            </div>
            <div class="card-body excerpt {{ $errors->has('date') ? ' has-error' : '' }} has-feedback">
                <div id="calendar"></div>
                <input type="hidden" name="date" id="selected-date">

                @if ($errors->has('date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                @endif
            </div>

        </div> 

        <button class="btn btn-primary-green" type="submit"><i class="align-middle" data-feather="save"></i>
            <span class="align-middle">Guardar</span></button>
        <a class="btn btn-dark text-white" href="{{ route('backend.products.index') }}"><i class="align-middle"
                data-feather="slash"></i> <span class="align-middle">Cancelar</span></a>

    </div>
</div>
