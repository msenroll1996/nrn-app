@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{--start loader--}}
        <div class="loader loader-default" id="loader"></div>
        {{--end loader--}}

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Notice</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Edit Notice</h3>
                        <a href="{{url('admin/notices')}}" class="back-button btn-green">List</a>

                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        {!! Form::open(['url' => '/admin/notices/'.$setting->id, 'class' => 'form-horizontal', 'method'=> 'POST','files' => true]) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Title <span style="color: red";> * </span></label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="title" value="{{$setting->title}}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Image <span style="color: red";> * </span></label>
                                    <input type="file" class="form-control"   name="image" value="{{old('image')}}">
                                    <br>
                                    <span >
                                        <img src="{{url($setting->image ?? '' )}}" alt="N/A" style="width: 100px;">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Short Description <span style="color: red";> * </span></label>
                                    <textarea class="form-control" name="excerpt" rows="4">{{$setting->excerpt}}</textarea>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label>Featured News<span style="color: red";> * </span> </label>
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="" selected disabled>Please select</option>
                                        @foreach(config('custom.featured_types') as $in => $val)
                                            <option value="{{$in}}" @if($setting->type == $in) selected @endif>{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Notice Type<span style="color: red";> * </span> </label>
                                    <select name="notice_type" id="notice_type" class="form-control" required onchange="getNoticeType()">
                                        <option value="" selected disabled>Please select notice type</option>
                                        @foreach(config('custom.notice_types') as $index => $value)
                                            <option value="{{$index}}" @if($setting->notice_type == $index) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Publish Date <span style="color: red";> * </span></label>
                                    <input type="text" class="form-control getDate"   name="publish_date" value="{{$setting->publish_date}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status<span style="color: red";> * </span> </label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="" selected disabled>Please select Status</option>
                                        @foreach(config('custom.status') as $indexa => $value1)
                                            <option value="{{$indexa}}" @if($setting->status == $indexa) selected @endif>{{$value1}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="news_section">
                            @if($setting->nrn_notice)
                                @include('admin.notice.nrna_notice')
                            @endif
                            @if($setting->third_party_notice)
                                @include('admin.notice.third_party_notice')
                            @endif
                        </div>
                        <div class="form-group row create-button">
                            <div class="col-sm-10 col-md-12">
                                <button type="submit" class="btn btn-create" onclick="validateForm()">Update</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>

        function getNoticeType() {
            var notice_type = $('#notice_type').val();
            var notice_id = '<?php echo $setting->id ; ?>';
            start_loader();
            $.ajax({
                type: 'GET',
                url:Laravel.url+'/admin/notice_type/'+notice_type+'/'+notice_id,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                success:function(data){
                    end_loader()
                    $('.my_section').remove();
                    $('#news_section').append(data['html']);
                    getCk();

                },
                error: function(error) {
                    end_loader()
                }
            });
        }
        function getCk(){
            ClassicEditor
                .create( document.querySelector( '#body1' ) )
                .catch( error => {
                    // console.error( error );
                } );
            ClassicEditor
                .create( document.querySelector( '#body2' ) )
                .catch( error => {
                    // console.error( error );
                } );
            ClassicEditor
                .create( document.querySelector( '#body3' ) )
                .catch( error => {
                    // console.error( error );
                } );
                ClassicEditor
                .create( document.querySelector( '#body4' ) )
                .catch( error => {
                    // console.error( error );
                } );
                ClassicEditor
                .create( document.querySelector( '#body5' ) )
                .catch( error => {
                    // console.error( error );
                } );
                ClassicEditor
                .create( document.querySelector( '#body6' ) )
                .catch( error => {
                    // console.error( error );
                } );

        }
        $(document).ready(function() {
            ClassicEditor
                .create( document.querySelector( '#body3' ) )
                .catch( error => {
                    // console.error( error );
                } );
                ClassicEditor
                .create( document.querySelector( '#body4' ) )
                .catch( error => {
                    // console.error( error );
                } );
                ClassicEditor
                .create( document.querySelector( '#body5' ) )
                .catch( error => {
                    // console.error( error );
                } );
                ClassicEditor
                .create( document.querySelector( '#body6' ) )
                .catch( error => {
                    // console.error( error );
                } );
        })

        function validateForm(){
            $('#body4').removeAttr('required');
            $('#body5').removeAttr('required');
            $('#body6').removeAttr('required');
        }
    </script>



@endsection

