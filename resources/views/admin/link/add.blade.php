@extends('admin.layout.app')
@section('content')
@include('admin.layout.content_header', ['header' => 'Link', 'currenct_page' => 'Edit'])

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-12">
                <div class="card card-primary">


                    <form method="post" action="{{ route('admin.link.store') }}"
                        enctype="multipart/form-data">
                        @csrf



                        <div class="card-body">
                            @include('admin.utils.show_error')
                            @include('admin.utils.show_success')
                        </div>

                        @include('admin.link.utils.show', ['items' => $link_items,'pages' => $pages])


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
