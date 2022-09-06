
<link rel="stylesheet" href="./pagination.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/pagination.css') }}">
@if ($paginator->lastPage() > 1)
<ul>
    <li class="{{ ($paginator->currentPage() == 1) ? 'disabled' : '' }}">
        
        <a href="{{ $paginator->url($paginator->currentPage() - 1) }}">Previous</a>
    </li>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
    <li disabled=false class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'disabled' : '' }}">
        <a href="{{ $paginator->url($paginator->currentPage()+1) }}" >Next</a>
    </li>
</ul>
@endif
