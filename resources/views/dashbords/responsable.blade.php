@extends('adminlte::page')

@section('content')

<div class="small-box" style="background-color: rgba(190, 190, 190, 0.5);">
    <div class="inner">
      <p>Productions</p>
    </div>
    <div class="icon">
      <i class="fas fa-shopping-cart"></i>
    </div>
    <a href="{{ route('productions.index') }}" class="small-box-footer" style="background-color: rgba(190, 190, 190, 0.5);">
      <span style="color: black;">Plus d'informations</span> <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>

<div class="small-box " style="background-color: rgba(195, 230, 203, 0.5);" >
  <div class="inner">
    <p>Planning</p>
  </div>
  <div class="icon">
    <i class="fas fa-calendar-alt"></i>
  </div>
  <a href="planning" class="small-box-footer" style="background-color: rgba(195, 230, 203, 0.5);">
    <span style="color: black;">Plus d'informations</span><i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

<div class="small-box " style="background-color: rgba(190, 190, 190, 0.5);">
  <div class="inner">
    <p>Cadence</p>
  </div>
  <div class="icon">
    <i class="fas fa-chart-line"></i>
  </div>
  <a href="cadence" class="small-box-footer" style="background-color: rgba(190, 190, 190, 0.5);">
    <span style="color: black;">Plus d'informations</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

<div class="small-box" style="background-color: rgba(195, 230, 203, 0.5);">
  <div class="inner">
    <p>Articles</p>
  </div>
  <div class="icon">
    <i class="fas fa-cube"></i>
  </div>
  <a href="{{ route('articles.index') }}" class="small-box-footer" style="background-color: rgba(195, 230, 203, 0.5);">
    <span style="color: black;">Plus d'informations</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

<div class="small-box " style="background-color: rgba(190, 190, 190, 0.5);">
  <div class="inner">
    <p>Recette</p>
  </div>
  <div class="icon">
    <i class="fas fa-fw fa-share"></i> <!-- Modification de l'icône -->
  </div>
  <a href="recette" class="small-box-footer" style="background-color: rgba(190, 190, 190, 0.5);">
    <span style="color: black;">Plus d'informations</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

<div class="small-box " style="background-color: rgba(195, 230, 203, 0.5);">
  <div class="inner">
    <p>Arrêts déclarés</p>
  </div>
  <div class="icon">
    <i class="fas fa-exclamation-triangle"></i>
  </div>
  <a href="{{ route('arrets.index') }}" class="small-box-footer" style="background-color: rgba(195, 230, 203, 0.5);">
    <span style="color: black;">Plus d'informations</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

<div class="small-box " style="background-color: rgba(190, 190, 190, 0.5);">
  <div class="inner">
    <p>Consommation IP</p>
  </div>
  <div class="icon">
    <i class="fas fa-chart-bar"></i>
  </div>
  <a href="consommations" class="small-box-footer" style="background-color: rgba(190, 190, 190, 0.5);">
    <span style="color: black;">Plus d'informations</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

<div class="small-box " style="background-color: rgba(195, 230, 203, 0.5);">
  <div class="inner">
    <p>Rendement</p>
  </div>
  <div class="icon">
    <i class="fas fa-percent"></i>
  </div>
  <a href="rendement" class="small-box-footer"  style="background-color: rgba(195, 230, 203, 0.5);">
    <span style="color: white;">Calculer</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>


<div class="small-box "style="background-color: rgba(190, 190, 190, 0.5);">
  <div class="inner">
    <p>Rapport</p>
  </div>
  <div class="icon">
    <i class="fas fa-file-alt"></i>
  </div>
  <a href="rapport" class="small-box-footer" style="background-color: rgba(190, 190, 190, 0.5);">
    <span style="color: black;">Generer</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>


@endsection