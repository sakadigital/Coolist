<table border='1'>
  <tr>
    <th>Id.</th>
    <th>Name</th>
    <th>Address</th>
    <th>Token</th>
    <th>Action</th>
  </tr>
  @foreach($data as $company)
  <tr>
    <th>{{$company->id}}</th>
    <th>{{$company->name}}</th>
    <th>{{$company->address}}</th>
    <th>{{$company->token}}</th>
    <th>
    <a href="{{URL::to('companies/update/'.$company->id)}}">Update</a>
    <a href="#" class="delete" id="{{$company->id}}">Delete</a>
    </th>
  </tr> 
  @endforeach
</table>

<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
<script type="text/javascript">
  $('.delete').click(function(e){
    e.preventDefault();

    var id = $(this).attr('id');
    var ask = confirm("Anda yakin?");
    if (ask)
    {
      $.ajax({
        url : "{{URL::to('companies/delete')}}/"+id,
        type : "DELETE",
        data: {"_token":"{{csrf_token()}}"},
        success:function(){
          alert('Data barhasi di hapus');
          window.location.reload();
        }
      })
    }
  })
</script>