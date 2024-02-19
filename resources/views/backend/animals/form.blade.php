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
                {!! Form::label('specie', 'Espécie', ['class' => 'card-title mb-0', 'for' => 'specie']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('specie') ? ' has-error' : '' }} has-feedback">
                {!! Form::text('specie', null, ['class' => 'form-control', 'placeholder' => 'Espécie', 'required']) !!}

                @if ($errors->has('specie'))
                    <span class="help-block">
                        <strong>{{ $errors->first('specie') }}</strong>
                    </span>
                @endif
            </div>


            <div class="card-header">
                {!! Form::label('race', 'Raça', ['class' => 'card-title mb-0', 'for' => 'race']) !!}
                <font color="red">*</font>
            </div>
            <div class="card-body {{ $errors->has('race') ? ' has-error' : '' }} has-feedback">
                {!! Form::text('race', null, ['class' => 'form-control', 'placeholder' => 'Raça', 'required', 'min'=>0]) !!}

                @if ($errors->has('race'))
                    <span class="help-block">
                        <strong>{{ $errors->first('race') }}</strong>
                    </span>
                @endif
            </div>

        </div>

        <div class="card">
            <div class="card-header">
                {!! Form::label('image', 'Imagem do Animal', [
                    'id' => 'image',
                    'class' => 'card-title mb-0',
                ]) !!}
            </div>
            <div class="card-body {{ $errors->has('image') ? ' has-error' : '' }} has-feedback">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="{{ $animal->image_url ? $animal->image_url : '/backend/img/no-image.png' }}"
                            alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"
                        style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Seleccione a
                                imagem</span><span class="fileinput-exists">Mudar</span>{!! Form::file('image') !!}</span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                    </div>
                </div>

                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
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
        <a class="btn btn-dark text-white" href="{{ route('backend.animals.index') }}"><i class="align-middle"
                data-feather="slash"></i> <span class="align-middle">Cancelar</span></a>

    </div>
</div>
