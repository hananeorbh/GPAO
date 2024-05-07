@extends('adminlte::page')

@section('content')

<div class="small-box " style="background-color: rgba(190, 190, 190, 0.5);">
    <div class="inner">
      <p>Production</p>
    </div>
    <div class="icon">
      <i class="fas fa-shopping-cart"></i>
    </div>
    <a href="productions" class="small-box-footer" style="background-color: rgba(190, 190, 190, 0.5);">
      <span style="color: white;">Plus d'informations</span> <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>

<div class="small-box " style="background-color: rgba(195, 230, 203, 0.5);">
  <div class="inner">
    <p>Arrêts déclarés</p>
  </div>
  <div class="icon">
    <i class="fas fa-exclamation-triangle"></i>
  </div>
  <a href="arrets" class="small-box-footer" style="background-color: rgba(195, 230, 203, 0.5);">
    <span style="color: white;">Plus d'informations</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

<div class="small-box " style="background-color: rgba(190, 190, 190, 0.5);">
  <div class="inner">
    <p>Consommation</p>
  </div>
  <div class="icon">
    <i class="fas fa-chart-bar"></i>
  </div>
  <a href="consommations" class="small-box-footer" style="background-color: rgba(190, 190, 190, 0.5);">
    <span style="color: white;">Plus d'informations</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

@endsection