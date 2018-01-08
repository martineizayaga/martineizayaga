@extends('main')

@section('title', 'Homepage')

@section('content')
	<h1>Blog Posts</h1>
    <div class="archive">

        @foreach($postsdates as $year => $monthposts)
            <h2 class="archive-year">{{ $year }}</h2>
            @foreach($monthposts as $month => $monthpost)
                <h3>{{ date('F', strtotime($monthpost{0}->created_at)) }}</h3>
                <ul class="archive-item">
                @foreach($monthpost as $post)
                    <li>
                        <span class="archive-title"><a href="{{ '/blog/' . $post->slug }}">{{ $post->title }}</a></span>
                        <span class="archive-date">{{ date('M jS, h:ia', strtotime($post->updated_at)) }}</span>
                    </li>
                @endforeach
                </ul>
            @endforeach
        @endforeach
    </div>
@endsection