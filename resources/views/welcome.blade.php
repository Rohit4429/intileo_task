<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>


<div class="container py-5">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
            <a href="{{route('list')}}" class="mb-3 btn btn-info">View List</a>
            <div class="card p-3">
                <div class="card-body">
                    <form action="{{route('store')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                          <label for="">State</label>
                          <select name="state" id="" class="form-control">
                            <option value="">Select</option>
                            @foreach ($state as $item)
                                <option value="{{$item->id}}">{{$item->description}}</option>
                            @endforeach
                          </select>
                          @error('state')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>

                        <div class="form-group mb-3">
                          <label for="">District</label>
                          <input type="text" name="district" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            @error('district')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="py-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
