@extends('client.template')

@section('pageContent')

<header id="zedex-header" class="zedex-cover js-fullheight" role="banner"
  style="background-image: url({{ asset('img/club_4.jpg') }});" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="display-t js-fullheight">
          <div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
            <h1>All your Events <em>&amp;</em> Venues <em>in</em> One Hub</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<div id="zedex-about" class="zedex-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-pull-1 images-wrap animate-box" data-animate-effect="fadeInLeft">
        <img src="{{ asset('client/img/party_1.jpg') }}" alt="zedex event management" class="img-fluid h-100 w-75">
      </div>
      <div class="col-md-5 col-md-push-2 animate-box">
        <div class="section-heading">
          <h2>Event of the Day !</h2>
          <p>Today, we're spotlighting one of the most anticipated events in the world of technology and
            innovation—the Tech Innovators Summit 2024! Whether you're a developer, entrepreneur, or simply a tech
            enthusiast, this event brings together industry leaders to share cutting-edge ideas, breakthrough
            innovations, and the future of tech as we know it.</p>
          <span class="zedex-price">$20<sup>.50</sup></span>
          <p><span class="zedex-emoji">📅</span> Date: October 17, 2024 <br>
            <span class="zedex-emoji">📍</span> Location: Virtual & In-Person (Toronto, Canada) <br>
            <span class="zedex-emoji">🎯</span> Why Attend? <br>
            Hear from top innovators shaping the future of tech <span class="zedex-emoji">🧠</span>
            Don't miss out! Head to the link in bio to register now or learn more about what's coming next in the
            tech world. 🌐
          </p>
          @if($events->isNotEmpty())
            <p><a href="{{ route('book.ticket', $events->first()->ev_id) }}" class="btn btn-primary btn-outline">Book a Ticket</a></p>
          @else
            <p><a href="{{ route('book.ticket', 'default') }}" class="btn btn-primary btn-outline">Book a Ticket</a></p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@endsection