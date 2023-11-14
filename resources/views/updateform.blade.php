@extends('layout.app')

@section('content')

  
 <div class = "form">
    
 <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <div class="text-center">
      <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">SST CAFE</h1>
    </div>
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Coffee Types Edition</h2>
  </div>

  @if(session('success'))
    <div class="bg-green-200 p-4 rounded-md mb-4">
      {{ session('success') }}
    </div>
  @endif

  @if(session('error'))
    <div class="bg-red-100 text-red-500 border border-red-400 px-4 py-2 rounded mb-4">
        {{ session('error') }}
    </div>
  @endif

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action = "/updateform/{{$coffee->id}}" method = "POST">
    @csrf
    @method('PUT')
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
        <div class="mt-2">
          <input type="text" name="name" value="{{$coffee->name}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>

        @error('name')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
        </div>
        <!-- <div class="mt-2">
          <input type="text" name="description" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div> -->
        <div class="mt-2">
          <textarea id="about" type="text" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$coffee->description}}</textarea>
        </div>

        @error('description')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">SAVE</button>
      </div>
    </form>
  </div>
</div>
  
 </div>
</div>

<!-- </body>
</html> -->
@endsection