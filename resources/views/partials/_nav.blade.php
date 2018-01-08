<header id="masthead">
    <h3 id="masthead-title"><a href="/">@me393</a></h3>
    <nav id="web-nav">
        <ul>
        	<li><a href="/now">Now</a></li>
            <li><a href="/portfolio">Portfolio</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="https://drive.google.com/file/d/1ehGh5SzNzs1e4EEe-neRJdAItf0zCa4d/view?usp=sharing">CV</a></li>
            @if (Auth::guest())
            @else
            	<li>
                    <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endif
        </ul>
    </nav>
</header>