<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials._head')
    </head>
    <body>
        <div class="container">
            <div class="content">
                @include('partials._nav')
                @include('partials._messages')
                @yield('content')
                @include('partials._footer')  
            </div>
           
        </div>
        @include('partials._javascript')

</body>

</html>