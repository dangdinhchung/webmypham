<a href="{{ route('get.compare.list') }}" title="compare">
    <i class="fa fa-refresh" aria-hidden="true"></i>
    @if(Session::has('compare'))
      <span class=""> ({{ count(Session::get('compare'))}}) </span>
    @else
        <span class=""> (0) </span>
    @endif
</a>