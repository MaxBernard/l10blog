@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Posts</h3>
  <table class="table display table-dark table-sm table-bordered data-table">
  {{-- <table id="postsTable" class="table table-hover table-bordered table-striped data-table"> --}}
    <thead>
      <tr>
        <th class="text-center" style="width: 4%;">ID</th>
        <th>Title</th>
        <th class="text-center" style="width: 130px;">Category</th>
        <th class="text-center">Tag</th>
        <th class="text-center" style="width: 100px;">Created</th>
        <th class="text-center" style="width: 110px;">
          <a href="#" class="add-modal btn btn-success btn-sm">
            <i class="fa fa-plus"></i> New Post
          </a>
        </th>
      </tr>
    </thead>
    <tbody>
      {{-- @foreach ($posts as $post)
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{ date("D Y-M-d", strtotime($post->created_at)) }}</td>
        <td></td>
      </tr>
      @endforeach --}}
    </tbody>
  </table>
</div>

<script type="text/javascript">
  $(function () {
      
    var table = $('.data-table').DataTable({
      ajax: "{{ route('posts.index') }}",
      processing: true,
      serverSide: true,
      lengthMenu: [
        [10, 20, 25, 50, -1],
        [10, 20, 25, 50, 'All']
      ],
      columnDefs: [
        {
          targets: [0,2,3,4,5],
          className: 'dt-body-center'
        }
      ],
      columns: [
        {data: 'id', name: 'id'},
        {data: 'title', name: 'title'},
        {data: 'category', name: 'category'},
        {data: 'tag', name: 'tag'},
        {data: 'created_at', name: 'created_at'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
    });
      
  });
</script>

@endsection

@section('javascripts')
<script type="text/javascript">
  $(function () {
      
    var table = $('.data-table').DataTable({
      ajax: "{{ route('posts.index') }}",
      processing: true,
      serverSide: true,
      lengthMenu: [
        [10, 20, 25, 50, -1],
        [10, 20, 25, 50, 'All']
    ],
      columns: [
        {data: 'id', name: 'id'},
        {data: 'title', name: 'title'},
        {data: 'category', name: 'category'},
        {data: 'tag', name: 'tag'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
    });
      
  });
</script>
@endsection