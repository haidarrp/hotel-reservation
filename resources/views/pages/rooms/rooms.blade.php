@extends('main')

@section('content')
@if (session()->has('success'))
  <script>
      $(document).ready(function(){
          $("#successModal").modal('toggle');
      });
  </script>
@endif
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header px-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h4 class="mb-0">List Rooms</h4>
            </div>
            <div class="col-6 text-end">
              <a class="btn bg-gradient-dark mb-0" href="/rooms/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Room</a>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Room Number</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Room Area</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Floor</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rooms as $room)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md me-3">
                        <i class="fas fa-bed text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$room->room_number}}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{$room->price}}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{$room->type}}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-success">{{$room->room_area}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$room->floor}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <button class="btn btn-link text-secondary mb-0" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-xs"></i>
                    </button>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                      <li class="py-2">
                        <a href="rooms/update/{{$room->room_number}}">
                          <button class="dropdown-item border-radius-md" href="javascript:;">
                            <i class="fas fa-edit text-warning"></i>
                            <span class="d-inline">Edit</span>
                          </button>
                        </a>
                      </li>
                      <li>
                        <button class="dropdown-item border-radius-md" data-id="{{$room->room_number}}" onclick="deleteRoom(this)" data-bs-toggle="modal" data-bs-target="#deleteModal" id="deleteRoom">
                          <i class="fas fa-trash text-danger"></i>
                          <span class="d-inline">Delete</span>
                        </button>
                      </li>
                    </ul>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col text-center">
                <i class="fas fa-check-circle text-success fs-1"></i>
                <h4>Success</h4>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col text-center">
                <p>Room Deleted Successfully</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <form action="/rooms/delete" method="post">
            @csrf
          <div class="container">
            <div class="row justify-content-center">
              <div class="col text-center">
                <i class="fas fa-times-circle text-danger fs-1"></i>
                <h4>Are You Sure?</h4>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col text-center">
                <p>Do you really want to delete there room?</p>
                <input type="hidden" name="room_number" id="roomDeleteId" value="">
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col text-center">
                <button type="submit" class="btn btn-danger">Yes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
              </div>
            </div>
          </div>
          </form>
        </div>  
      </div>
    </div>
  </div>

  <script>
    function deleteRoom(event){
      var roomNumber = event.dataset.id
      console.log(roomNumber)
      var roomDeleteId = document.getElementById('roomDeleteId')

      roomDeleteId.value = roomNumber
    }
  </script>
@endsection