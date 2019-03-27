@extends('app')

@section('meta')
    <title>Sitemap | Oz Board Gamer</title>
    <meta name="description" content="Feeling lost? We can help you find your way">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="active"><span>Sitemap</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-12">
			      	<h1>Sitemap</h1>
			      </div>
			    </div>
			    <div class="row">
					<div class="col-12 col-sm-6">
						<h2><a href="/games">Game Types</a></h2>
						<ul>
							@foreach($types as $type)			
								<li><a href="/games/{{ $type->slug }}?page=1&sort=name-asc">{!! $type->name !!}</a></li>
							@endforeach
						</ul>
						<h2><a href="/mechanics">Game Mechanics</a></h2>
						<ul>
							@foreach($mechanics as $mechanic)			
								<li><a href="/mechanics/{{ $mechanic->slug }}">{!! $mechanic->name !!}</a></li>
							@endforeach
						</ul>
						<h2><a href="/themes">Game Themes</a></h2>
						<ul>
							@foreach($themes as $theme)			
								<li><a href="/themes/{{ $theme->slug }}">{!! $theme->name !!}</a></li>
							@endforeach
						</ul>
						<h2><a href="/designers">Game Designers</a></h2>
						<ul>
							@foreach($designers as $designer)			
								<li><a href="/designers/{{ $designer->slug }}">{!! $designer->name !!}</a></li>
							@endforeach
						</ul>
						<h2><a href="/publishers">Game Publishers</a></h2>
						<ul>
							@foreach($publishers as $publisher)			
								<li><a href="/publishers/{{ $publisher->slug }}">{!! $publisher->name !!}</a></li>
							@endforeach
						</ul>
						<h2><a href="/families">Game Families</a></h2>
						<ul>
							@foreach($families as $family)			
								<li><a href="/families/{{ $family->slug }}">{!! $family->name !!}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-12 col-sm-6">
						<h2><a href="/stores">Game Stores</a></h2>
						<ul>
							@foreach($stores as $store)			
								<li><a href="/stores/{{ $store->slug }}">{!! $store->name !!}</a></li>
							@endforeach
						</ul>
						<h2><a href="/quizzes">Game Quizzes</a></h2>
						<ul>
							@foreach($quizzes as $quiz)			
								<li><a href="/quizzes/{{ $quiz->slug }}">{!! $quiz->name !!}</a></li>
							@endforeach
						</ul>
						@foreach($categories as $category)			
								<h2><a href="/{{ $category->slug }}">{!! $category->name !!}</a></h2>
								<ul>
									@foreach($category->posts()->get() as $post)		
										<li><a href="/{{ $category->slug }}/{{ $post->slug }}">{!! $post->name !!}</a></li>
									@endforeach
								</ul>
						@endforeach
					</div>					
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection
