<li @if(url_match($link)) class="active" @endif>
    <a href="{{ $link }}"  >{{ $name }}</a>
</li>