@extends('client.template')

@section('title', 'Events')

@section('pageContent')

<div id="zedex-events" class="zedex-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Upcoming Events</h2>
      </div>
    </div>
    <div class="row" id="events-list">
      <!-- Events will be loaded here via AJAX -->
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
  loadEvents();

  function loadEvents() {
    $.get('/api/events', function(data) {
      let html = '';
      data.forEach(event => {
        html += `
          <div class="col-md-4">
            <div class="event-card">
              <h3>${event.ev_name}</h3>
              <p>${event.ev_desc}</p>
              <p>Date: ${event.ev_date0}</p>
              <p>Venue: ${event.ev_venue}</p>
              <p>Price: $${event.ev_entrance}</p>
              <a href="{{ route('event.details', '') }}/${event.ev_id}" class="btn btn-primary">View Details</a>
              <button class="btn btn-secondary bookmark-btn" data-event-id="${event.ev_id}">Bookmark</button>
              <button class="btn btn-info like-btn" data-event-id="${event.ev_id}">Like</button>
            </div>
          </div>
        `;
      });
      $('#events-list').html(html);
    });
  }

  $(document).on('click', '.bookmark-btn', function() {
    const eventId = $(this).data('event-id');
    $.post('/api/bookmark', { event_id: eventId }, function(response) {
      if (response.bookmarked) {
        alert('Bookmarked!');
      } else {
        alert('Unbookmarked!');
      }
    });
  });

  $(document).on('click', '.like-btn', function() {
    const eventId = $(this).data('event-id');
    $.post('/api/like', { event_id: eventId }, function(response) {
      if (response.liked) {
        alert('Liked!');
      } else {
        alert('Unliked!');
      }
    });
  });
});
</script>
@endsection