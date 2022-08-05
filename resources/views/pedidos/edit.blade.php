@extends('main')

@section('content')

@section('javascripts_bottom')
  <script type="text/javascript">
    $(document).ready(function(){
      if($('div.alert').length) {
        $country_id = $("#id_country").val();
        if($country_id) {
          requestAjax($country_id);
        }
        else {
          $('#instituicao_id').html('<option value="">Selecione um País</option>');
        }
      }

      $("#id_country").change(function () {
        if($(this).val()) {
          requestAjax($(this).val());
        }
        else {
          $('#instituicao_id').html('<option value="">Selecione um País</option>');
        }
      });
    });

    function requestAjax(country_id) {
      // CSRF Token
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        url:"{{ route('pedidos.getinstituicao') }}",
        type: 'post',
        dataType: "json",
        data: {
           _token: CSRF_TOKEN,
           search: country_id,
        },
        beforeSend: function() {
          $('#instituicao_id').html('<option value="">Aguarde... </option>');
        },
        success: function( data ) {
           var options = '<option value="">Selecione a Instituição</option>';
           for (var i = 0; i < data.length; i++) {
            options += '<option value="' + data[i].id + '">'
               +data[i].nome_instituicao + '</option>';
           }
           $("#instituicao_id").html(options);
        }
      });
    }
  </script>
@endsection

<input type="hidden" id="saved_instituicao_id" name="saved_instituicao_id" value="{{$pedido['instituicao_id']}}">

<div class="card">
  <div class="card-header">
    <h5>
      <b>À Comissão de Graduação da Faculdade de Filosofia Letras e Ciências Humanas da USP.</b>
    </h5>
  </div>
<div class="card-body">
  <form method="POST" action="/pedidos/{{$pedido->id}}" enctype="multipart/form-data">
  @csrf
  @method('patch')
    <div class="form-group">
      <label id="id_pais" for="id_pais" class="required"><b>Selecione o país da Instituição</b></label>
      <br>
        <select id="id_country" name="id_country">
          <option value="">Selecione o País </option>
          @foreach($countries as $id => $nome)
          <option value="{{ $id }}" {{ (old('id_country', $country_id) == $id ?
                                     'selected' : '') }}>{{ $nome }}</option>
          @endforeach
        </select>
    </div>
    <div class="form-group">
      <label id="instituicao" for="instituicao" class="required"><b>Selecione a Instituição </b></label>
      <br>
      <select id="instituicao_id" name="instituicao_id">
        <option value="">Selecione uma Instituição</option>
        @foreach($instituicoes as $id => $nome_instituicao)
          <option value="{{ $id }}" {{ (old('instituicao_id',
            $pedido->instituicao_id) == $id ? 'selected' : '') }}>
            {{ $nome_instituicao }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
          <label for="file" class="required" enctype="multipart/form-data">
            <b>Adicione o boletim das matérias cursadas:</b><br>
            Arquivo salvo:
            <a href="/pedidos/{{ $pedido->id }}/showfile"><i class="far fa-file-pdf"></i>  {{$pedido->original_name}}</a>
          </label> <br>

          <input type="file" name="file">
    </div>
    <div class="form-group">
          <button type="submit" class="btn btn-success">Atualizar</button>
    </div>
    </form>
</div>
</div>


@endsection
