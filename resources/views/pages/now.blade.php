@extends('main')

@section('title', 'Now')

@section('content')
    <h1>What I'm doing now</h1>
    <div class="lead">
    	<ul id="now-list">
	        <li>Writing <a href="/blog">Blog posts</a>.</li>
	        <li>Reading books.</li>
	        <li>Making ukulele chord progressions.</li>
	        <li>Taking these classes SP 2018
	        	<ul>
		        	<li itemscope itemtype="http://schema.org/Course"><span itemprop="courseCode">CHEM 2090</span> - <span itemprop="about">Engineering General Chemistry</span></li>
		        	<li itemscope itemtype="http://schema.org/Course"><span itemprop="courseCode">CS 3410</span> - <span itemprop="about">Computer System Organization and Programming</span></li>
		        	<li itemscope itemtype="http://schema.org/Course"><span itemprop="courseCode">CS 4700</span> - <span itemprop="about">Foundations of Artificial Intelligence</span></li>
		        	<li itemscope itemtype="http://schema.org/Course"><span itemprop="courseCode">LING 1101</span> - <span itemprop="about">Introduction to Linguistics</span></li>
		        	<li itemscope itemtype="http://schema.org/Course"><span itemprop="courseCode">MATH 2930</span> - <span itemprop="about">Differential Equations for Engineers</span></li>
		        	<li itemscope itemtype="http://schema.org/Course"><span itemprop="courseCode">PE 1640</span> - <span itemprop="about">Basic Rock Climbing</span></li>
		        </ul>
	        </li>   
	    </ul>
    </div>
    <p id="now-update">This was last updated on <time datetime="2018-01-05">January 5th, 2018</time><time></time></p>
@endsection