@include('front.utils.header.show', ['default_items' => $default_header, 'page_headers' => $page->headerItem])
@include('front.utils.body.show', ['pageComponents' => $page->pageComponents])
@include('front.utils.footer.show', ['default_items' => $default_footer, 'page_footer' => $page->footerItem])