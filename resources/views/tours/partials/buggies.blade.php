@if($tour->buggies)
<div class="col col-md-4">
  @if(isset($buggies))
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Ninos</h3>
    </div>
    <div class="panel-body">
      <p><strong>Min </strong> {{ $buggies->min or ''}}</p>
      <p><strong>Max </strong> {{ $buggies->max or '' }}</p>
      <p><strong>Costo </strong> {{ $buggies->cost or ''}}</p>
    </div>
  </div>
  @else
  <div class="panel panel-info">
    <div class="panel-body">
      Gestionar Buggies
    </div>
  </div>
  @endif
</div>
@endif