<x-layout>


<div>
     @if ( $errors->any() )  
        <ul>
        @foreach ($errors->all() as $error)
            <li> {{$error}} </li>
        @endforeach  
        </ul>
    
    
       @endif 
 </div>

 
<form method="post" action="{{route('blog.store')}}"> 

    @csrf
    @method('post')

    <div>
        <label>Name</label> <br>
        <input type="string" name="title" placeholder="Title"/>
    </div>
    <div>
        <label>Excerpt</label> <br>
        <input type="string" name="excerpt" placeholder="Excerpt"/>
    </div>
    <div>
        <label>Body</label> <br>
        <input type="string" name="body" placeholder="Body"/>
    </div>
    
    <div>
    <input type="submit" value="Create a Blog Post!">
    </div>
    
    </form>



</x-layout>