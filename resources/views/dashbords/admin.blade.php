@extends('adminlte::page')
@section('content')


<div class="small-box" style="background-color: rgba(195, 230, 203, 0.5);">
  <div class="inner">
    <p>Utilisateurs</p>
  </div>
  <div class="icon">
    <i class="fas fa-users"></i>
  </div>
  <a href="users" class="small-box-footer" style="background-color: rgba(195, 230, 203, 0.5);">
  <span style="color: black;">Plus d'informations</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>



<div class="small-box" style="background-color: rgba(190, 190, 190, 0.5);">
  <div class="inner">
    <p>Productions</p>
  </div>
  <div class="icon">
    <i class="fas fa-shopping-cart"></i>
  </div>
  <a href="productions" class="small-box-footer" style="background-color: rgba(190, 190, 190, 0.5);">
    <span style="color: black;">Plus d'informations</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>



<div class="small-box" style="background-color: rgba(195, 230, 203, 0.5);">
  <div class="inner">
    <p>Articles</p>
  </div>
  <div class="icon">
    <i class="fas fa-shopping-cart"></i>
  </div>
  <a href="articles" class="small-box-footer" style="background-color: rgba(195, 230, 203, 0.5);">
  <span style="color: black;">Plus d'informations</span><i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

<div class="small-box" style="background-color: rgba(190, 190, 190, 0.5);">
  <div class="inner">
    <p>Plannings</p>
  </div>
  <div class="icon">
    <i class="fas fa-shopping-cart"></i>
  </div>
  <a href="planning" class="small-box-footer" style="background-color: rgba(190, 190, 190, 0.5);">
  <span style="color: black;">Plus d'informations</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>
<div class="small-box" style="background-color: rgba(195, 230, 203, 0.5);">
  <div class="inner">
    <p>Arréts de productions</p>
  </div>
  <div class="icon">
    <i class="fas fa-shopping-cart"></i>
  </div>
  <a href="arrets" class="small-box-footer" style="background-color: rgba(200, 233, 223, 0.5);">
  <span style="color: black;">Plus d'informations</span><i class="fas fa-arrow-circle-right"></i>
  </a>
</div>
<div class="small-box" style="background-color: rgba(190, 190, 190, 0.5);">
  <div class="inner">
    <p>Lignes</p>
  </div>
  <div class="icon">
    <i class="fas fa-shopping-cart"></i>
  </div>
  <a href="ligne" class="small-box-footer" style="background-color: rgba(190, 190, 190, 0.5);">>
  <span style="color: black;">Plus d'informations</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

<div class="small-box" style="background-color: rgba(195, 230, 203, 0.5);">
  <div class="inner">
    <p>Ateliers</p>
  </div>
  <div class="icon">
    <i class="fas fa-shopping-cart"></i>
  </div>
  <a href="atelier" class="small-box-footer"style="background-color: rgba(195, 230, 203, 0.5);">
  <span style="color: black;">Plus d'informations</span><i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

<div class="small-box " style="background-color: rgba(190, 190, 190, 0.5);">
  <div class="inner">
    <p>Catalogue des arrets</p>
  </div>
  <div class="icon">
    <i class="fas fa-shopping-cart"></i>
  </div>
  <a href="catalog" class="small-box-footer"  style="background-color: rgba(190, 190, 190, 0.5);">
  <span style="color: black;">Plus d'informations</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

<div class="small-box" style="background-color: rgba(195, 230, 203, 0.5);">
  <div class="inner">
    <p>Consommations_IP</p>
  </div>
  <div class="icon">
    <i class="fas fa-shopping-cart"></i>
  </div>
  <a href="consommation_ip" class="small-box-footer" style="background-color: rgba(195, 230, 203, 0.5);">
  <span style="color: black;">Plus d'informations</span><i class="fas fa-arrow-circle-right"></i>
  </a>
</div>
<div class="small-box " style="background-color: rgba(190, 190, 190, 0.5);">
  <div class="inner">
    <p>Rendement</p>
  </div>
  <div class="icon">
    <i class="fas fa-percent"></i>
  </div>
  <a href="rendement" class="small-box-footer" style="background-color: rgba(190, 190, 190, 0.5);">
  <span style="color: black;">Calculer</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>36
<div class="small-box " style="background-color: rgba(195, 230, 203, 0.5);">
  <div class="inner">
    <p>Rapport</p>
  </div>
  <div class="icon">
    <i class="fas fa-file-alt"></i>
  </div>
  <a href="rapport" class="small-box-footer" style="background-color: rgba(195, 230, 203, 0.5);">
  <span style="color: black;">Générer</span><i class="fas fa-arrow-circle-right"></i>
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
<div class="small-box " style="background-color: rgba(195, 230, 203, 0.5);">
  <div class="inner">
    <p>Recette</p>
  </div>
  <div class="icon">
    <i class="fas fa-chart-pie"></i>
  </div>
  <a href="recette" class="small-box-footer" style="background-color: rgba(195, 230, 203, 0.5);">
    <span style="color: black;">Plus d'informations</span> <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>


@endsection

