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

    <div class="well">
        <h4>热门浏览</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @if($categorys)
                    @foreach($categorys as $k => $item)
                        @if($k%2 == 0)   <li><a href="#">{{$item->name}}</a></li>     @endif
                    @endforeach
                    @endif
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @if($categorys)
                    @foreach($categorys as $k => $item)
                        @if($k%2 == 1)   <li><a href="#">{{$item->name}}</a></li>     @endif
                    @endforeach
                    @endif
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <div class="well">
        <h4>热门推荐</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @if($categorys)
                    @foreach($categorys as $k => $item)
                        @if($k%2 == 0)   <li><a href="#">{{$item->name}}</a></li>     @endif
                    @endforeach
                    @endif
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @if($categorys)
                    @foreach($categorys as $k => $item)
                        @if($k%2 == 1)   <li><a href="#">{{$item->name}}</a></li>     @endif
                    @endforeach
                    @endif
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>博客类别</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @if($categorys)
                    @foreach($categorys as $k => $item)
                        @if($k%2 == 0)   <li><a href="#">{{$item->name}}</a></li>     @endif
                    @endforeach
                    @endif
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @if($categorys)
                    @foreach($categorys as $k => $item)
                        @if($k%2 == 1)   <li><a href="#">{{$item->name}}</a></li>     @endif
                    @endforeach
                    @endif
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