@extends('main')

@section('content')
@if (session()->has('success'))
<script>
    $(document).ready(function() {
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
                        <h4 class="mb-0">List Entertainments</h4>
                    </div>
                    <div class="col-6 text-end">
                        <button type="button" class="btn bg-gradient-dark btn-block mb-3" data-bs-toggle="modal" data-bs-target="#addEntertainmentModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Entertainment</button>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Entertainments Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Allotment</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- data-bs-backdrop="static" -->
<div class="modal fade" id="addEntertainmentModal" tabindex="-1" role="dialog" aria-labelledby="addEntertainmentModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Entertainment</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Entertainment Name:</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="harga" class="col-form-label">Entertainment Price:</label>
                        <input type="number" class="form-control" id="harga" name="harga">
                    </div>
                    <div class="form-group">
                        <label for="kategori" class="col-form-label">Entertainment Category:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" id="food-beverages-radio" value="Food & Beverages">
                            <label class="custom-control-label" for="room-radio">Food & Beverages</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" id="indoor-radio" value="Indoor">
                            <label class="custom-control-label" for="ballroom-radio">Indoor</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" id="outdoor-radio" value="Outdoor">
                            <label class="custom-control-label" for="ballroom-radio">Outdoor</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="peruntukan" class="col-form-label">Entertainment Allotment:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="peruntukan" id="room-radio" value="Room">
                            <label class="custom-control-label" for="room-radio">Room</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="peruntukan" id="ballroom-radio" value="Ballroom">
                            <label class="custom-control-label" for="ballroom-radio">Ballroom</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="col-form-label">Entertainment Description:</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="myId" class="col-form-label">Entertainment Images:</label>
                        <div id="myId" class="dropzone"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bg-gradient-primary">
                    <!-- <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> -->
                    Add Data
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="" method="post">
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
                                <p>Do you really want to delete ___ entertainment?</p>
                                <input type="hidden" name="id" id="entertainment_id">
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
    let myDropzone = new Dropzone("#myId", {
        autoProcessQueue: false,
        url: "/file/post"
    });
</script>

@endsection