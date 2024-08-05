<x-layout>

<div>
    
    <!-- Checks if a success "key" has been sent to this view-->
    @if(session()->has('success'))

    <div> {{session('success')}}</div>   


    @endif

    </div>



<h1> List of Blogs </h1>
<a href="{{route('blog.create')}}">Create a New Blog!</a>
<table border='1'>

<tr>
<th>Date </th>
    <th>Title </th>
    <th>Excerpt </th>    
    <th>View </th>
    <th>Edit </th>
    <th>Delete </th>
    
</tr>

@foreach ($blogs as $blog)

<tr>
    <td>{{$blog->created_at}} </td>
    <td>{{$blog->title}} </td>
    <td>{{$blog->excerpt}} </td>
    <td> <a href="{{route('blog.view', ['blog' => $blog ])}}">View</a> </td>
    
    <!-- Taking the current $blog and sending it to the route  -->
    <td><a href="{{route('blog.edit', ['blog' => $blog ])}}">Edit</a> </td>
    <td>

    <form method="post" action="{{ route('blog.delete', ['blog' => $blog]) }}">

       <input type='submit' value="Delete Blog!">
    @csrf
    @method('delete')

    </form>
    </td>
    
</tr>


@endforeach

</table>






</x-layout>