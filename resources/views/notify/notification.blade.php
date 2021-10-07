@extends('layouts.admin_const')

@section('content')



  <div id="wrapper">



    <div id="main-content">
      <div class="container-fluid">
        <div class="block-header">
          <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-12">
              <!--<h2>Jquery Datatable</h2>-->
            </div>
            <div class="col-lg-7 col-md-4 col-sm-12">
              <ul class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{url('admin/home') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item">الإشعارات</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="row clearfix">
          <div class="col-lg-12">
            <div class="card">
              <div class="header">

                <ul class="nav nav-tabs-new ">
                  <li>
                    <h2 style="font-size: xx-large;">الإشعارات</h2>
                  </li> &nbsp;&nbsp;

                </ul>
              </div>
              <div class="body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover js-basic-example dataTable table-custom text-center">

                    <thead>
                      <tr>
                        <th>عنوان الرسالة</th>
                        <th>محتوى الرسالة</th>
                        <th> الصورة</th>
                        <th>تاريخ الحذف </th>
                        <th>الأجراءات</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($notifications as $notification)
                        <tr>

                          <td>{{ $notification->title_ar }}</td>
                          <td>{{ $notification->body_ar }}</td>
                          <td>
                            <?php 

                              if( $notification->image != '' && $notification->image != NULL){ ?>
                                <img src="{{asset('uploads/notify/' . $notification->image)}}" width="80" height="80">
                              <?php } ?>
                        </td>
                          <td>{{ $notification->expire_date }}</td>
                          <td>

                            <form action="{{url('/admin/notifications/'.$notification->id)}}" method="POST"  id="delete_{{$notification->id}}" enctype="multipart/form-data" style="display:inline;">
                                {{ csrf_field() }}
                                @method('delete')
                                {{-- <input type="hidden" name="place_id" value="{{$cat->id}}"> --}}
                                <a  onclick="$('#delete_{{$notification->id}}').submit();">
                                 <button class="btn btn-danger" data-toggle="tooltip" data-original-title="حذف">
                                         <i class="icon-trash" aria-hidden="true"></i>
                                 </button>
                                </a>
                            </form>
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
      </div>
    </div>
  </div>
@endsection


