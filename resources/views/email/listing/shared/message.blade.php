{{ $sender->name }} has shared a listing with you:

<br><br>
<a href="{{ route('listings.show', [$listing->area, $listing]) }}"><strong>{{ $listing->title }}</strong></a>
<br><br>

@if ($body)
---<br>
Message from {{ $sender->name }}:
<br>---<br>
{!! nl2br(e($body)) !!}
<br>---<br><br>
@endif
