@extends('front.layouts.front') 
@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                @if($posts)
                @foreach($posts as $item)
                <h2><a href="{{url('front/post/'.$item["id"])}}">{{$item['title']}}</a></h2>
                <p>
                    <span class="glyphicon glyphicon-time"></span> Posted on {{$item['created_at']}} by <a href="index.php">{{$item->adminUser->name}}</a>
                </p>
                <hr>
                <div class="pull-left kb-thumb-medium hidden-xs">
                    <a class="thumbnail" rel="bookmark" href="http://laravelacademy.org/post/6534.html">
                        <img class="img-responsive" src="http://laravelacademy.org/wp-content/uploads/2016/11/github-pages-256x128.jpg" alt="" height="128" width="256">
                    </a>
                </div>
                <div class="entry entry-excerpt">
                    <p>{{str_limit(strip_tags($item['content_html']), 300)}}</p>
                </div>
                <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->
                <div class="clearfix"></div>
                
                <footer class="entry-meta">
                    <p class="visible-xs">
                        <!-- <a class="btn btn-primary btn-block" rel="bookmark" href="http://laravelacademy.org/post/6521.html">
                        <i class="glyphicon glyphicon-link"></i>
                        阅读全文
                        </a> -->
                        <a class="btn btn-primary btn-block" href="#">阅读全文<span class="glyphicon glyphicon-chevron-right"></span></a>
                    </p>
                    <p class="pull-right hidden-xs">
                        <!-- <a class="btn btn-primary" rel="bookmark" href="http://laravelacademy.org/post/6521.html">
                        <i class="glyphicon glyphicon-link"></i>
                        阅读全文
                        </a> -->
                        <a class="btn btn-primary" href="{{url('front/post/'.$item["id"])}}">阅读全文<span class="glyphicon glyphicon-chevron-right"></span></a>
                    </p>
                    <p class="text-muted hidden-xs meta-data">
                        <span class="cat-links">
                            <i class="glyphicon glyphicon-folder-open"></i>
                              分类：
                            <a href="http://laravelacademy.org/project/{{$item->category->name}}" rel="category tag">{{$item->category->name}}</a>
                        </span>
                        <span class="tags-links">
                            <i class="glyphicon glyphicon-tags"></i>
                            标签：
                            @if($item['tag'])
                            @foreach($item->tag as $tag)
                            <a href="http://laravelacademy.org/tags/{{$tag->name}}" rel="tag">{{$tag->name}}</a> ,
                            @endforeach
                            @endif
                           <!--  <a href="http://laravelacademy.org/tags/jigsaw" rel="tag">Jigsaw</a> ,
                           <a href="http://laravelacademy.org/tags/laravel" rel="tag">Laravel</a> ,
                           <a href="http://laravelacademy.org/tags/%e5%b8%83%e5%b1%80" rel="tag">布局</a> ,
                           <a href="http://laravelacademy.org/tags/%e8%a7%86%e5%9b%be" rel="tag">视图</a> ,
                           <a href="http://laravelacademy.org/tags/%e9%9d%99%e6%80%81%e7%ab%99%e7%82%b9" rel="tag">静态站点</a> -->
                        </span>
                        <span class="comments-link">
                            <i class="glyphicon ipt-icon-bubbles2"></i>
                            <a class="ds-thread-count" href="http://laravelacademy.org/post/6521.html#respond" data-thread-key="6521">暂无评论</a>
                        </span>
                    </p>
                    <div class="clearfix"></div>
                </footer>
                @endforeach
                @endif
                
                <div class="page-control pull-right">
                    @if($posts)
                    {!! $posts->fragment('foo')->links() !!}
                    @endif
                </div>
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
