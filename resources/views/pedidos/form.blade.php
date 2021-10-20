@section('javascripts_bottom')
  <script type="text/javascript">
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $(document).ready(function(){
        $("#id_country").change(function () {
          if( $(this).val() ) {
            $.ajax({
              url:"{{ route('pedidos.getinstituicao') }}",
              type: 'post',
              dataType: "json",
              data: {
                 _token: CSRF_TOKEN,
                 search: $(this).val(),
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
          else {
            $('#instituicao_id').html('<option value="">Selecione um País</option>');
          }
        });
      });
  </script>
@endsection

<div class="card">
  <div class="card-header">
    <h5>
      <b>À Comissão de Graduação da Faculdade de Filosofia Letras e Ciências Humanas da USP.</b>
    </h5>
  </div>
<div class="card-body">
  <form method="POST" action="/pedidos" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label id="id_pais" for="id_pais" class="required"><b>Selecione o país da Instituição</b></label>
      <br>
        <select id="id_country" name="id_country">
              <option value="">Selecione um País </option>
          @foreach($countries as $country)
              <option value="{{ $country['id'] }}" 
                  @if(old('nome') == $country['nome']) selected @endif>
                  {{ $country['nome'] }}
              </option>
          @endforeach
        </select>
    </div>
    <div class="form-group">
      <label id="instituicao" for="instituicao" class="required"><b>Selecione a Instituição </b></label>
      <br>
      <select id="instituicao_id" name="instituicao_id">
              <option value="">Selecione uma Instituição </option>
          @foreach($instituicoes as $insti)
              <option value="{{ $insti['id'] }}" 
                  @if(old('nome_instituicao') == $insti['nome_instituicao']) selected @endif>
                  {{ $insti['nome_instituicao'] }}
              </option>
          @endforeach
          </select>
    </div>
    <div class="form-group">
          <label for="file" class="required"><b>Adicione o boletim das matérias cursadas:</b></label> <br>
          <input type="file" name="file">   
    </div>
    <div class="form-group">
          <button type="submit" class="btn btn-success">Enviar</button>
    </div>
    </form>
</div>
</div>

