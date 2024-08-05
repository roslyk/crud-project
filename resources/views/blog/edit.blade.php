<x-layout>

<!-- a Blog instance $blog inputted to this blade -->

<div>
     @if ( $errors->any() )  
        <ul>
        @foreach ($errors->all() as $error)
            <li> {{$error}} </li>
        @endforeach  
        </ul>
    
    
       @endif 
 </div>
 
<form method="post" action="{{route('blog.update',['blog' => $blog ])}}"> 

@csrf
@method('put')

    <div>
        <label>Name</label> <br>
        <input type="string" name="title" value="{{$blog->title}}"/>
    </div>
    <div>
        <label>Excerpt</label> <br>
        <input type="string" name="excerpt" value="{{$blog->excerpt}}"/>
    </div>
    <div>
        <label>Body</label> <br>
        <input type="string" name="body" value="{{$blog->body}}"/>
    </div>
    
    <div>
    <input type="submit" value="Update a Blog Post!">
    </div>
    
    </form>



</x-layout>