@extends('main')
@section('title', 'Hello!')

@section('content')
<article  itemscope itemtype="https://schema.org/Blog">
    <h1>About Me</h1>
    <img id="profile" src="{{ asset('img/profile.jpeg') }}">
    <div class="lead bio">
    	<p><span itemprop="author">Martín Eizayaga</span> is a <span itemprop="jobTitle">CS major</span> at <span itemprop="alumniOf">Cornell University</span>. He is involved with the <span itemprop="memberOf"><a href="http://www.gleeclub.com/martin-eizayaga">Glee Club</a></span>, <span itemprop="memberOf"><a href="https://www.cuchambersingers.com/">Chamber Singers</a></span>, <span itemprop="memberOf"><a href="http://www.hangovers.com/martin">Hangovers A Cappella</a></span>, <span itemprop="memberOf"><a href="https://www.facebook.com/cornellmusicvs/">Cornell Music Vs.</a></span>, <span itemprop="memberOf"><a href="http://acsu.cornell.edu/">ACSU</a></span>, and <span class="memberOf"><a href="https://cornellcatholic.org/">Cornell Catholic</a></span>.</p>
    	<p>Born in London to Argentine parents, Martín moved to Argentina when he was very young. He later moved to the US in 2008.</p>
    	<p>You can find him biking around campus rain or shine. Don't be afraid to say hello!</p>
    </div>
</article>
@endsection