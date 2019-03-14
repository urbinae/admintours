@if($tour->infants)
<div class="col col-md-4">
  @if(isset($infants))
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Ninos</h3>
    </div>
    <div class="panel-body">
      <p><strong>Min </strong> {{ $infants->min or ''}}</p>
      <p><strong>Max </strong> {{ $infants->max or '' }}</p>
      <p><strong>Costo </strong> {{ $infants->cost or ''}}</p>
    </div>
  </div>
  @else
  <div class="panel panel-info">
    <div class="panel-body">
      Gestionar infantes
    </div>
  </div>
  @endif
</div>
@endif