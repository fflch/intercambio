<table width=100% class="table table-bordered">
  <thead>
    <tr align="center">
      <th scope="col">Optativas Livres</th>
      <th scope="col">Optativas Eletivas</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td align="center">{{ $pedido->disciplinas->where('tipo', 'Optativa Livre')->where('status', 'Deferido')->sum('conversao') }}</td>
      <td align="center">{{ $pedido->disciplinas->where('tipo', 'Optativa Eletiva')->where('status', 'Deferido')->sum('conversao') }}</td>
      <td align="center">{{ $pedido->disciplinas->where('status', 'Deferido')->sum('conversao') }}</td>
    </tr>
  </tbody>
</table>
