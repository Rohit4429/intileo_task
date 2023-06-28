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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
 {{-- datatable --}}
 <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">
        <div class="row">
            <div class="col-8">
                <div class="form-group mb-3">
                    <select name="state"  id="state_id" class="form-control">
                      <option value="All" selected>All</option>
                      @foreach ($state as $item)
                          <option value="{{$item->id}}">{{$item->description}}</option>
                      @endforeach
                    </select>
                    @error('state')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
            </div>
            <div class="col-4">
                <a href="/" class="btn btn-info text-white">Add </a>
                <a href="{{route('download.pdf')}}" class="btn btn-danger text-white">Download PDF </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table mb-3 align-middle table-hover" id="masterDatatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Disrict</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                    </table>
                </div>

            </div>
        </div>
    </div>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>


    <script type="text/javascript">
    $(document).ready(function(){

    function getid() {
        console.log($('#state_id').val());
          return $('#state_id').val();
      }

        $(function () {
      var datatable = $('#masterDatatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
                url:"{{ route('list') }}",
                data: function(data) {
                    data.id = getid();

                  }
          },
          columns: [
                {
                    data: 'DT_RowIndex'
                },

                {
                    data: 'name'
                },
                {
                    data: 'action'
                },

          ],
          dom: '<"top float-right"B><"top float-left"l>frtip',



      });


    });
    $("#state_id").on("change",function(){
        $('#masterDatatable').DataTable().ajax.reload();
    })


    });
</script>

</body>

</html>
