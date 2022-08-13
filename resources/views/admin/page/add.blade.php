@extends('admin.layout.app')
@section('content')
@include('admin.layout.content_header', ['header' => 'Component', 'currenct_page' => 'Add'])

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-12">
                <div class="card card-primary">


                    <form method="post" action="{{ route('admin.page.store', ['page' => $page]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @include('admin.utils.show_error')
                            @include('admin.utils.show_success')
                            <input type="hidden" name="id" value="{{ $page->encrypted_id }}"/>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name" value="{{ old('name',$page->name) }}" />
                            </div>
                            <div class="form-group">
                                <label for="name">Component</label>
                            </div>
                            @include('admin.page.utils.component_items', ['components' => $components,'items' => $page->components])


                            <div class="form-group">
                                <label for="name">Header (Optional)</label>
                            </div>
                            @include('admin.header.utils.header_item',['items' => $page->headerItem])

                            <div class="form-group">
                                <label for="name">Footer (Optional)</label>
                            </div>
                            @include('admin.footer.utils.footer_item',['items' => $page->footerItem])


                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="" disabled>Select</option>
                                    <option value="1" <?php if($page->exists() != null && $page->status=='1'){ echo
                                        'selected'; }?>>Active</option>
                                    <option value="0" <?php if($page->exists() != null && $page->status=='0'){ echo
                                        'selected'; }?>>InActive</option>
                                </select>
                            </div>
                        </div>

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
@section('footer')
@endsection
