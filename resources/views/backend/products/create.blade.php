@extends('layouts.backend.main')

@section('title', 'Novo Produto')

@section('style')
    <link rel="stylesheet" href="{{ asset('backend/plugins/tag-editor/jquery.tag-editor.css') }}">
@endsection

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Novo Produto</h1>
        {!! Form::model($product, [
            'method' => 'POST',
            'autocomplete' => 'off',
            'route' => 'backend.products.store',
            'id' => 'product-form',
        ]) !!}

        @include('backend.products.form')

        {!! Form::close() !!}

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('backend/plugins/tag-editor/jquery.caret.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/tag-editor/jquery.tag-editor.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>

    <script type="text/javascript">
        /*criar o slug automaticamente*/
        $('#name').on('blur', function() {
            var theTitle = this.value.toLowerCase().trim(),
                slugInput = $('#slug'),
                theSlug = theTitle.replace(/&/g, '-and-')
                .replace(/[^a-z0-9-]+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '');

            slugInput.val(theSlug);
        });

        /*activar markdowns na biografia*/
        var simplemde1 = new SimpleMDE({
            element: $('#bio')[0]
        });


        /* mostrar e oculta a lista de servicos com base no tipo de funcionario */
        $(document).ready(function() {
            //esconder os campos ao carregar a pagina
            $('#lista-servicos').hide();

            //ver o valor do selectbox actual, ao carregar a pagina
            $selectedValue = $('#role').val();
            //'99ab6950-3cbc-481c-8a2e-c43d708deef2'
            if ($selectedValue == 'funcionario') {
                $('#lista-servicos').show();
            }

            //add evento change ao selectbox
            $('#role').change(function() {
                //obter o valor selecionado
                var tipoUsuario = $(this).val();
                //console.log("Tipo de Usuario: ", tipoUsuario);

                //mostrar ou ocultar com base no valor selecionado
                if (tipoUsuario == 'funcionario') {
                    $('#lista-servicos').show();
                } else {
                    $('#lista-servicos').hide();
                }
            });
        });

        var today = new Date().toISOString().split('T')[0];
        var todayHour = new Date().toISOString().split('T')[1];
        document.getElementsByName("data_nascimento")[0].setAttribute('max', today);
    </script>

@endsection
