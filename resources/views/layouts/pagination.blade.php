
@if ($paginator->hasPages())
<div class="row justify-content-center">
	<div class="col-md-12">
		<nav aria-label="...">
    		<ul class="pagination">
		        @if ($paginator->onFirstPage())

		            <li class="page-item disabled">
			            <a href=""class="page-link">Prev</a>
			        </li>
		        @else
		            <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link"> Prev</a></li>
		        @endif



		        @foreach ($elements as $element)

		            @if (is_string($element))
		                <li class="page-item disabled"><a href=""class="page-link">{{ $element }}</a></li>
		            @endif



		            @if (is_array($element))
		                @foreach ($element as $page => $url)
		                    @if ($page == $paginator->currentPage())
		                        <li class="page-item active"><a href="" class="page-link">{{ $page }}</a></li>
		                    @else
		                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
		                    @endif
		                @endforeach
		            @endif
		        @endforeach



		        @if ($paginator->hasMorePages())
		            <li class="next"><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link">Next</a></li>
		        @else
		            <li class="disabled"><a href="" class="page-link"><span>Next</span></a></li>
		        @endif
	        </ul>
		</nav>
	</div>
</div>
@endif
