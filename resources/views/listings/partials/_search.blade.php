@if  (isset($category))
    <listing-search category-id="{{ $category->id }}" :area-ids="{{ $area->descendants->pluck('id')->push($area->id) }}"></listing-search>
@else
    {{-- @php dd($area) @endphp --}}
    <listing-search :area-ids="{{ $area->descendants->pluck('id')->push($area->id) }}"></listing-search>
@endif
<hr>
