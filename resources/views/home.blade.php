@extends('layouts.app')
@section('title', 'Home Page')
@section('content')

<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" style="height:650px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?q=80&w=1172&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" style="height:650px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://plus.unsplash.com/premium_photo-1661284828052-ea25d6ea94cd?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" style="height:650px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- About Section -->
<section class="mb-5">
  <div class="container text-center">
    <h2 class="mb-4">About Us</h2>
    <p class="lead">
      We are a dedicated team offering web solutions to businesses of all sizes. 
      Our mission is to deliver exceptional digital experiences that help our clients grow and succeed.
    </p>
  </div>
</section>
<hr>

<!-- Contact Us Section -->
<section class="mb-5">
  <div class="container">
    <h2 class="text-center mb-4">Contact Us</h2>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form>
          <div class="mb-3">
            <label for="contactName" class="form-label">Name</label>
            <input type="text" class="form-control" id="contactName" placeholder="Your Name">
          </div>
          <div class="mb-3">
            <label for="contactEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="contactEmail" placeholder="Your Email">
          </div>
          <div class="mb-3">
            <label for="contactMessage" class="form-label">Message</label>
            <textarea class="form-control" id="contactMessage" rows="5" placeholder="Your Message"></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary px-5">Send Message</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


@endsection 
