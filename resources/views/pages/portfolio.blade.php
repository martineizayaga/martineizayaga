@extends('main')

@section('title', 'Portfolio')

@section('content')
	<article id="portfolio">
	    <h1>Some of My Work</h1>
	    <section>
	    	<a href="http://imgur.com/a/U8fxa"><h2>Blog Backend</h2></a>
	    	<a href="http://imgur.com/a/U8fxa" class="portfolio-img"><img src="{{ asset('img/blog-imgur-screenshot.png') }}"></a>
	    </section>
	    {{-- <section>
	    	<a href="http://imgur.com/a/U8fxa"><h2>Blog Backend</h2></a>
	    	<a href="http://imgur.com/a/U8fxa" class="portfolio-img"><img src="{{ asset('img/blog-imgur-screenshot.png') }}"></a>
	    </section> --}}
    </article>
@endsection