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
                {!! Form::label('price', 'Preço', ['class' => 'card-title mb-0', 'for' => 'price']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('price') ? ' has-error' : '' }} has-feedback">
                {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Preço', 'required', 'min'=>0, 'step'=>0.01]) !!}

                @if ($errors->has('price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>


            <div class="card-header">
                {!! Form::label('stock', 'Estoque', ['class' => 'card-title mb-0', 'for' => 'stock']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('stock') ? ' has-error' : '' }} has-feedback">
                {!! Form::number('stock', null, ['class' => 'form-control', 'placeholder' => 'Estoque', 'required', 'min'=>0]) !!}

                @if ($errors->has('stock'))
                    <span class="help-block">
                        <strong>{{ $errors->first('stock') }}</strong>
                    </span>
                @endif
            </div>

        </div>

    </div>

    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                {!! Form::label('description', 'Descrição', ['class' => 'card-title mb-0', 'for' => 'description']) !!}
            </div>
            <div class="card-body excerpt {{ $errors->has('description') ? ' has-error' : '' }} has-feedback">
                {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '2']) !!}

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
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
