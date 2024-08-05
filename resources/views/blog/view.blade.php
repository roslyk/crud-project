<x-layout>


<h1>{{ $blog->title }}</h1>

<p> Blog posted at {{ $blog->created_at }} </p>
<br>
<p> {{$blog->body }} </p>



</x-layout>