@extends('front.layouts.front') 
@section('content')
    <style type="text/css">
        .container img {height: auto; max-width: 100%;}
    </style>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <ol id="breadcrumbs" class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">
                    <li typeof="v:Breadcrumb">
                        <a rel="v:url" property="v:title" href="http://laravelacademy.org/">首页</a>
                    </li>
                    <li typeof="v:Breadcrumb">
                        <a rel="v:url" property="v:title" href="http://laravelacademy.org/tutorials">教程</a>
                    </li>
                    <li typeof="v:Breadcrumb">
                        <a rel="v:url" property="v:title" href="http://laravelacademy.org/tutorials/blog">博客系列</a>
                    </li>
                    <li class="active" typeof="v:Breadcrumb">
                        <span property="v:title">{{$post->title}}</span>
                    </li>
                </ol>

                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <article id="post-2265" class="post-2265 post type-post status-publish format-standard has-post-thumbnail hentry category-blog tag-laravel tag-333 tag-26 tag-421 tag-335 tag-89 tag-86 tag-38 tag-23 tag-82 tag-12">
                            <header class="entry-header page-header">
                                <h1 class="entry-title">{{$post->title}}</h1>
                                    <div class="entry-meta text-muted">
                                        <span class="posted-on"><i class="glyphicon glyphicon-calendar"></i> Posted on <a href="http://laravelacademy.org/post/2265.html" rel="bookmark"><time class="entry-date published" datetime="{{$post->created_at}}">{{$post->created_at}}</time></a></span><span class="byline"> by <span class="author vcard"><i class="glyphicon glyphicon-user"></i> <a class="url fn n" href="http://laravelacademy.org/post/author/nonfu">{{$post->adminUser->name}}</a></span></span>
                                    </div>
                                    <!-- .entry-meta -->
                            </header>
                            <!-- .entry-header -->
                            <div class="entry-content">
                                {!! $post->content_html !!}
                            </div>
                        </article>
                    </main>
                </div>
                <!-- .entry-content -->

            </div>

            <!-- Blog Sidebar Widgets Column -->
            @include('front.layouts.sidebarWidgets')

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
@endsection