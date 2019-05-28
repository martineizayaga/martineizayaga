@extends('main')
@section('title', 'Hello!')

@section('content')
<article  itemscope itemtype="https://schema.org/Blog">
    <h1>About Me</h1>
    <img id="profile" src="{{ asset('img/profile.jpeg') }}">
    <div class="lead bio">
    	<p>Hi, I'm <span itemprop="author">Martín Eizayaga</span>. I'm a <span itemprop="jobTitle">CS major</span> at <span itemprop="alumniOf">Cornell University</span>. I am involved with the <span itemprop="memberOf"><a href="http://www.gleeclub.com/martin-eizayaga">Glee Club</a></span>, <span itemprop="memberOf"><a href="https://www.cuchambersingers.com/">Chamber Singers</a></span>, <span itemprop="memberOf"><a href="http://www.hangovers.com/martin">Hangovers A Cappella</a></span>, <span itemprop="memberOf"><a href="https://www.facebook.com/cornellmusicvs/">Cornell Music Vs.</a></span>, <span itemprop="memberOf"><a href="http://acsu.cornell.edu/">ACSU</a></span>, and <span class="memberOf"><a href="https://cornellcatholic.org/">Cornell Catholic</a></span>.</p>
    	<p>I'm passionate about programming and music, and I love to meet new people.</p>
    	<p>Make sure to check out <a href="/now">what I'm up to</a>!</p>
    </div>
</article>
@endsection