@extends('admin.pages.master')

@section('styles')
<style>
     .make-border {
          border: 1px solid;
          overflow: scroll;
          height: 320px;
     }
</style>
@endsection

@section('content')

<div class="container">
     <div class="container-fluid">
          <div class="row">
               <div class="col-md-3">
                    <div class="make-border">
                         <h5>To</h5>
                         <div class="list-group" id="list-tab" role="tablist">
                              @php
                              $x = 0;
                              @endphp
                              @foreach ($keys as $item)

                              <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list"
                                   href="#" onclick="from({{ $x++ }})"> {{ $item }} </a>

                              @endforeach


                         </div>
                    </div>
               </div>

               <div class="col-md-3">
                    <div class="make-border">
                         <h5>From</h5>
                         <div class="list-group" id="schedules_div" role="tablist">
                         </div>
                    </div>
               </div>               
               <div class="col-md-3">
                    <div class="make-border">
                         <h5>Messages</h5>
                         <div class="list-group" id="sub_cat2_div" role="tablist">

                         </div>
                    </div>
               </div>

          </div>
     </div>
</div>


{{-- <div class="col-md-6">
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
</div> --}}
@endsection

@section('scripts')
<script>
     $(document).ready(function() {
          $('#dashboardCard').html('');
     });

     function from(x) {
          //console.log(x);
          $.ajax({
               url: 'meassage-level1',
               method: 'GET',
               dataType: 'JSON',
               data: {index:x},
               success: function(result) {
                    console.log(result);
                    $('#schedules_div').html('');
                    $('#sub_cat2_div').html('');
          for(var i=0;i<result[0].length;i++){
        $('#schedules_div').append('<a class="list-group-item list-group-item-action" id="list-home-list"  href="#" onclick="messages('+ result[1] + ',' + i + ')" data-toggle="list" href="#" role="tab" aria-controls="home">'+result[0][i]+'</a>');
        }
               }
          });
     }

     function messages(index, index2) {
          //console.log(index2);
          $.ajax({
               url: 'meassage-level2',
               type: 'GET',
               dataType: 'HTML',
               data: {index: index, index2:index2},
               success: function(result) {
                    console.log(result);                    
                    $('#sub_cat2_div').html('');
                    $('#sub_cat2_div').html(result);
               }
          });
     }
</script>

@endsection