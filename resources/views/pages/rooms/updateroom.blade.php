@extends('main')

@section('content')
@if (session()->has('success'))
    <script>
        $(document).ready(function(){
            $("#modalSuccess").modal('show');
        });
    </script>
  @endif
<div class="row justify-content-md-center">
    <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-6 d-flex align-items-center">
                <h4 class="mb-0">Update Rooms</h6>
              </div>
            </div>
          </div>
          <div class="card-body p-3">
            <div class="row">
              <div class="col-6">
                <form role="form" action="{{$room->room_number}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <label>Room Number</label>
                  <div class="mb-3">
                    <input type="text" name="room_number" class="form-control @error('room_number') is-invalid @enderror" value="@error('room_number') {{old('room_number')}} @else {{$room->room_number}} @enderror" placeholder="101" aria-label="room_number" aria-describedby="email-addon" required>
                    @error('room_number')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                  <label>Price</label>
                  <div class="mb-3">
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="@error('price') {{old('price')}} @else {{$room->price}} @enderror" placeholder="250000" aria-label="price" aria-describedby="email-addon" required>   
                    @error('price')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                  <label>Type</label>
                  <div class="mb-3">
                    <select class="form-select" name="type">
                        <option value="2 Single" @if($room->type === '2 Single') selected @endif>2 Single</option>
                        <option value="1 Queen" @if($room->type === '1 Queen') selected @endif>1 Queen</option>
                    </select>
                    @error('type')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                  <label>Room Area</label>
                  <div class="mb-3">
                    <input type="text" name="room_area" class="form-control @error('room_area') is-invalid @enderror" value="@error('room_area') {{old('room_area')}} @else {{$room->room_area}} @enderror" placeholder="15" aria-label="room_area" aria-describedby="email-addon" required>   
                    @error('room_area')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                  <label>Floor</label>
                  <div class="mb-3">
                    <input type="text" name="floor" class="form-control @error('floor') is-invalid @enderror" value="@error('floor') {{old('floor')}} @else {{$room->floor}} @enderror" placeholder="1" aria-label="floor" aria-describedby="email-addon" required>   
                    @error('floor')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0">Update</button>
                  </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <img src="{{asset('storage/' .$room->photos[0]->text)}}" class="img-thumbnail d-block" style="width: 20%">
                  <label for="formFile" class="form-label">Upload Photo 1</label>
                  <input type="hidden" value="{{$room->photos[0]->id}}" name="idPhoto1">
                  <input class="form-control" type="file" name="photo1" id="formFile" accept="image/png, image/jpg, image/jpeg">
                </div>
                <div class="mb-3">
                  <img src="{{asset('storage/' .$room->photos[1]->text)}}" class="img-thumbnail d-block" style="width: 20%">
                  <label for="formFile" class="form-label">Upload Photo 2</label>
                  <input type="hidden" value="{{$room->photos[1]->id}}" name="idPhoto2">
                  <input class="form-control" type="file" name="photo2" id="formFile" accept="image/png, image/jpg, image/jpeg">
                </div>
                <div class="mb-3">
                  <img src="{{asset('storage/' .$room->photos[2]->text)}}" class="img-thumbnail d-block" style="width: 20%">
                  <label for="formFile" class="form-label">Upload Photo 3</label>
                  <input type="hidden" value="{{$room->photos[2]->id}}" name="idPhoto3">
                  <input class="form-control" type="file" name="photo3" id="formFile" accept="image/png, image/jpg, image/jpeg">
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="modalSuccess" aria-hidden="true" aria-labelledby="modalSuccess" tabindex="-1">
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
              <p>Update Room Successfully</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection