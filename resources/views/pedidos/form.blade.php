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
      <label id="autorização" for="autorização" class="required"><b>Você autoriza a divulgação do seu relatório para outros estudantes da FFLCH (no site da CCInt)?</b></label>
      <br>
      <select id="autorizacao" name="autorizacao">
          <option value="">Selecione uma das opções</option>
            @foreach($autorizacoes as $autorizacao)
              <option>
                {{$autorizacao}}
              </option>
            @endforeach
      </select>
    </div>
    <div class="form-group">
      <label id="periodo" for ="periodo" class="required"><b>Período do intercâmbio</b></label>
      <br>
        <input type="text" data-mask="00/00/0000" name="periodo_intercambio_inicio" class="datepicker"> <b>-</b>
        <input type="text" data-mask="00/00/0000" name="periodo_intercambio_fim" class="datepicker">
    </div>
    <div class="form-group">
      <label id="escolha_destino" for="escolha_destino" class="required"><b>Como foi o processo de escolha da instituição de destino? Por que você escolheu ir para essa universidade?</b></label>
      <br>
      <textarea name="escolha_destino" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="visto_info" for="visto_info" class="required"><b>Como foi o processo de solicitação do visto? Teve que traduzir algum documento? Teve que viajar para outro estado? Qual foi o prazo para emissão?</b></label>
      <br>
      <textarea name="visto_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="bancaria_info" for="bancaria_info" class="required"><b>Como resolveu as questões bancárias (câmbio, VTM, envio de dinheiro para o exterior)?</b></label>
      <br>
      <textarea name="bancaria_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="seguro_info" for="seguro_info" class="required"><b>Você contratou seguro-saúde? Tem alguma indicação?</b></label>
      <br>
      <textarea name="seguro_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="passagem_info" for="passagem_info" class="required"><b>Conseguiu comprar passagens mais baratas? Como?</b></label>
      <br>
      <textarea name="passagem_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="moradia_universidade_info" for="moradia_universidade_info" class="required"><b>A universidade ofereceu moradia estudantil ou você contratou por conta própria?</b></label>
      <br>
      <textarea name="moradia_universidade_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="bagagem_info" for="bagagem_info" class="required"><b>Como foi a preparação da bagagem? O que foi essencial levar?</b></label>
      <br>
      <textarea name="bagagem_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="preparo_info" for="preparo_info" class="required"><b>Teve algo que gostaria de ter feito antes de viajar e não fez, ou algo que gostaria de ter sabido antes da viagem?</b></label>
      <br>
      <textarea name="preparo_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="registro_chegada_info" for="registro_chegada_info" class="required"><b>Foi necessário fazer algum registro ao chegar no país?</b></label>
      <br>
      <textarea name="registro_chegada_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="abrir_conta_info" for="abrir_conta_info" class="required"><b>Precisou abrir conta bancária?</b></label>
      <br>
      <textarea name="abrir_conta_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="chip_info" for="chip_info" class="required"><b>Adquiriu chip de celular? Foi fácil?</b></label>
      <br>
      <textarea name="chip_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="moradia_info" for="moradia_info" class="required"><b>Caso não tenha fechado a moradia ainda no Brasil, nos conte como foi a escolha do lugar onde ficou. Morou sozinho ou com outros estudantes? Ficou perto da universidade?</b></label>
      <br>
      <textarea name="moradia_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="transportepublico_info" for="transportepublico_info" class="required"><b>Como era o transporte público? Você tinha algum desconto por ser estudante?</b></label>
      <br>
      <textarea name="transportepublico_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="orientacao_info" for="orientacao_info" class="required"><b>Houve alguma reunião de orientação?</b></label>
      <br>
      <textarea name="orientacao_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="curso_idioma_info" for="curso_idioma_info" class="required"><b>A universidade ofereceu algum curso de idiomas? Pago ou gratuito?</b></label>
      <br>
      <textarea name="curso_idioma_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="matricula_materia_info" for="matricula_materia_info" class="required"><b>Como foi a matrícula nas matérias de interesse? Você pode assistir as aulas antes de se matricular?</b></label>
      <br>
      <textarea name="matricula_materia_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="RU_info" for="RU_info" class="required"><b>A universidade possuía restaurante universitário? O valor era acessível?</b></label>
      <br>
      <textarea name="RU_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="taxa_info" for="taxa_info" class="required"><b>Você teve que pagar alguma taxa administrativa?</b></label>
      <br>
      <textarea name="taxa_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="exp_academica_info" for="exp_academica_info" class="required"><b>Nos conte como foi sua experiência acadêmica (provas, trabalhos, aulas, relação com os professores, etc) e o grau de exigência na universidade estrangeira.</b></label>
      <br>
      <textarea name="exp_academica_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="usp_ifriend_info" for="usp_ifriend_info" class="required"><b>A universidade possui algum programa como o “USP I-Friend” ou similar?</b></label>
      <br>
      <textarea name="usp_ifriend_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="dificuldade_aula_info" for="dificuldade_aula_info" class="required"><b>Teve alguma dificuldade inicial em acompanhar as aulas? E com o idioma?</b></label>
      <br>
      <textarea name="dificuldade_aula_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="adaptacao_info" for="adaptacao_info" class="required"><b>Como foi sua adaptação (cultural, social, etc)?</b></label>
      <br>
      <textarea name="adaptacao_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="dificuldade_info" for="dificuldade_info" class="required"><b>Quais foram suas maiores dificuldades durante o intercâmbio?</b></label>
      <br>
      <textarea name="dificuldade_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="integracao_info" for="integracao_info" class="required"><b>A universidade realiza atividades para integração dos alunos estrangeiros? Quais atividades?</b></label>
      <br>
      <textarea name="integracao_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="bolsa_info" for="bolsa_info" class="required"><b>Você recebeu algum tipo de bolsa? Ela foi suficiente para se manter durante o intercâmbio?</b></label>
      <br>
      <textarea name="bolsa_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="gasto_medio_info" for="gasto_medio_info" class="required"><b>Qual era o gasto médio mensal (alimentação, transporte, moradia, livros, etc)?</b></label>
      <br>
      <textarea name="gasto_medio_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="atividade_remunerada_info" for="atividade_remunerada_info" class="required"><b>Você exerceu algum tipo de atividade remunerada durante o intercâmbio? Qual?</b></label>
      <br>
      <textarea name="atividade_remunerada_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
      <label id="dica_info" for="dica_info" class="required"><b>Quais dicas/sugestões você daria para os alunos da FFLCH interessados em fazer intercâmbio nessa universidade/país? O que fazer? O que não fazer?</b></label>
      <br>
      <textarea name="dica_info" rows="4" cols="90"></textarea>
    </div>
    <div class="form-group">
          <label for="file" class="required" enctype="multipart/form-data"><b>Adicione o boletim das matérias cursadas:</b></label> <br>
          <input type="file" name="file">   
    </div>
    <div class="form-group">
          <button type="submit" class="btn btn-success">Enviar</button>
    </div>
    </form>
</div>
</div>

