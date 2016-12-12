<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('front/blog-home/css/bootstrap.min.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('front/blog-home/css/blog-home.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

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
                                        <span class="posted-on"><i class="glyphicon glyphicon-calendar"></i> Posted on <a href="http://laravelacademy.org/post/2265.html" rel="bookmark"><time class="entry-date published" datetime="2015-11-29T22:25:22+08:00">2015年11月29日</time></a></span><span class="byline"> by <span class="author vcard"><i class="glyphicon glyphicon-user"></i> <a class="url fn n" href="http://laravelacademy.org/post/author/nonfu">学院君</a></span></span>
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
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

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

    <!-- jQuery -->
    <script src="{{asset('common/js/jquery-1.11.1.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('front/blog-home/js/bootstrap.min.js')}}"></script>
</body>

</html>
