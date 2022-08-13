@extends('admin.layout.app')
@section('content')
@include('admin.layout.content_header', ['header' => 'Header', 'currenct_page' => 'Edit'])

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-12">
                <div class="card card-primary">


                    <form method="post" action="{{ route('admin.header.store') }}"
                        enctype="multipart/form-data">
                        @csrf



                        <div class="card-body">
                            @include('admin.utils.show_error')
                            @include('admin.utils.show_success')
                        </div>

                        @include('admin.header.utils.header_item', ['items' => $header_items])


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
