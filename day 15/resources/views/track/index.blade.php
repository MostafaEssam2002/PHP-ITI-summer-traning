<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Tracks Data</title>
    <x-bootstrap-css></x-bootstrap-css>

</head>

<body>
    <x-navbar></x-navbar>
 <div class="d-flex justify-content-around">
       <h1 class="text-success text-center m-5  ">All Tracka Data</h1>
    {{-- @dump($tracks) --}}

    <div class="m-5">
            <a class="text-decoration-none" href="{{ route('tracks.create' ) }}">
               {{-- <button class="btn btn-info">Create New track</button> --}}
                 <x-button class="info" name="Create New track"/>
            </a>

    </div>
<a href="{{route('home')  }}"> <x-button class="success m-5" name="Home"></x-button>
</a>
 </div>
    <table class="table table-bordered w-75 m-auto p-1 text-center">
        <thead>

                <th>id</th>
                <th>Name</th>
                <th>Description</th>
              <th>Img</th>
              <th>Actions</th>

        </thead>

        </tr>
        </thead>
        <tbody>
@foreach($tracks as $track)
<tr>
    <td>{{ $track->id }}</td>
    <td>{{ $track->name }}</td>
    <td>{{ $track->description}}</td>
    <td><img src="{{ $track->image }}" alt="{{$track->name}}" srcset="" width="100px" height="100px"></td>
      <td class="p-2 d-flex justify-content-around">
          <div>
               <a class="text-decoration-none" href="{{ route('tracks.show',$track->id ) }}">
               {{-- <button class="btn btn-warning">View</button> --}}

               <x-button class="warning" name="View"/>
            </a>

          </div>
               <form action="{{ route('tracks.destroy',$track->id ) }}" method="post">
                 @method('delete')
                 @csrf
                 <x-button class="danger" name="Delete"></x-button>
               </form>
<div>

                 <a class="text-decoration-none" href="{{ route('tracks.update',$track->id ) }}">
               <x-button class="info" name="Update"></x-button></a>
</div>
            </td>
</tr>

@endforeach
        </tbody>


    </table>

<x-footer></x-footer>
<x-bootstrap-js></x-bootstrap-js>

</body>

</html>
