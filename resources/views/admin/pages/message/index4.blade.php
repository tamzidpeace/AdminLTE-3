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
               @for ($i = 0; $i < count($keys3); $i++)
               <div class="callout callout-info">
                    <h5><b>{{ $data[$keys[$index]][$keys2[$index2]][$keys3[$i]]['msgBody'] }}</b></h5>               
                    <h5><b>{{ $data[$keys[$index]][$keys2[$index2]][$keys3[$i]]['number'] }}</b></h5>               
                    <h5><b>{{ $data[$keys[$index]][$keys2[$index2]][$keys3[$i]]['parent'] }}</b></h5>               
                    <h5><b>{{ $data[$keys[$index]][$keys2[$index2]][$keys3[$i]]['receivedTime'] }}</b></h5>               
               </div>     
               @endfor                                           
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