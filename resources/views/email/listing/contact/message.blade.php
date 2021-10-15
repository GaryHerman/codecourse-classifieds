{{ $listing->user->name }},<br><br>

{{ $sender->name }} has contacted you about this listing, <a href="{{ route('listings.show', [$listing->area, $listing]) }}"></a> {{ $listing->title }}

<br><br>---<br>
{!! nl2br(e($body)) !!}
<br>---<br><br>

Reply directly to this email to get back to them.

