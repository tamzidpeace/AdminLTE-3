@extends('admin.pages.master')


@section('content')
<div class="col-md-6">
     <div style="margin-left:40%" class="card card-default">
          <div class="card-header">
               <h3 class="card-title">
                    <i class="fas fa-bullhorn"></i>
                    Messages
               </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
               @php $x = 0; @endphp
               @foreach ($keys as $item)
               <a href="meassage-level1/{{ $x++ }}">
                    <div class="callout callout-info">
                         <h5><b>{{ $item }}</b></h5>
                    </div>
               </a>
               @endforeach
          </div>
          <!-- /.card-body -->
     </div>
</div>
@endsection

@section('scripts')
<script>
     $(document).ready(function() {
          $('#dashboardCard').html('');
     });
</script>

@endsection