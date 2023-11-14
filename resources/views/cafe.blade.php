@extends('layout.app')

@section('content')

    <div class="relative isolate px-6 pt-14 lg:px-8">
        
        
        
        
        <div class="container mx-auto">
        <div class="text-center">
        <p>
            Premium Coffee : <b>{{ $premium_coffee }}</b>
        </p>
        <h3>Coffee List</h3>
        </div>
        <br>
        <ul role="list" class="divide-y divide-gray-100">
            @foreach($coffees as $coffee)
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                    
                      <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $coffee->name}}</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $coffee->description }}</p>
                      </div>
                    </div>
                    <!-- <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Customer Feedback</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">Date <time datetime="2023-01-23T13:23Z">9-1-2023</time></p>
                    </div> -->

                    <!-- <div>
                      <button type="submit" class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">UPDATE</button>
                      
                      <button type="submit" class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">DELETE</button>
                    </div>    -->
                    
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                      <!-- <button type="button" class="text-sm font-semibold leading-6 text-gray-900">UPDATE</button> -->
                      

                      <div>
                        <a href="/updateform/{{$coffee->id}}">
                          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">EDIT</button>
                        </a>
                      </div>

                      <div>
                      <!-- <form method="POST" action="{{ url('/cafe' . '/' . $coffee->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }} 
                      </form>-->
                        <form action="/deleteitem/{{$coffee->id}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600" onclick="return confirm("Confirm Delete?")">DELETE</button>
                        </form>
                      </div>
                      
                    </div>

                    

                </li>
            @endforeach
        </ul>
    </div>
    
<br>
<br>

    <div>
     <div class="text-center">
        <div>
          <a href="/updateform">
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">PREVIOUS</button>
          </a>

          <a href="/updateform">
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">NEXT</button>
          </a>
        </div>

        <div>
          
        </div>
     </div>
    </div>



<!-- </body>
</html> -->

@endsection
