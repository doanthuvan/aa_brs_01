<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
    <div class="single-blog mb-50">
        <div class="blog-left-title">
            <h3>Danh mục</h3>
        </div>
        <div class="blog-side-menu">
            <ul class="list-group list-group-flush">
                @foreach ($categories as $category)
            <li class="list-group-item"><a  class ="text-dark" href="{{route('bookofcategory',$category->id)}}">{{$category->category_name}}</a></li>
                @endforeach
              </ul>
        </div>
    </div>
    <div class="single-blog mb-50">
        <div class="blog-left-title">
            <h3>Nhà xuất bản</h3>
        </div>
        <div class="blog-side-menu">
            <ul class="list-group list-group-flush">
                @foreach ($publishers as $publisher)
                <li class="list-group-item"><a class ="text-dark" href="{{route('bookofPublisher',$publisher->id)}}">{{$publisher->publisher_name}}</a></li>
                @endforeach
              </ul>
        </div>
    </div>
</div>