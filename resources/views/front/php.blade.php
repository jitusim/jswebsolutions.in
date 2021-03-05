@extends('layout.master')
@section('content')
    <div class="pageBody boxMain">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="panel-body">
                        @forelse($posts as $post)
                            <div class="row panel panel-default padding_div">
                                @if (!empty($post->image))
                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                                        <img src='{{url("public/uploadsFiles/postImage/$post->image")}}' alt="create ,Insert ,update,delete Opearation" class="img-thumbnail
                                        img-responsive">
                                    </div>
                                @endif
                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                    <h1 class="titleList">
                                      {{$post->title ?? "N/A"}}
                                    </h1>
                                        <p class="text-muted postDate">By <span class="glyphicon glyphicon-user"
                                            aria-hidden="true">
                                        </span>
                                        <?php echo sHelper::get_user_detail($post->user_id); ?> |
                                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                        <?php 
                                            if (!empty($post->updated_at)) {
                                            echo date('d/m/Y', strtotime($post->updated_at));
                                            }
                                        ?>
                                    </p>
                                    <p class="postDescription">
                                        <?php if (!empty($post->description)) {
                                        echo substr($post->description, 0, 300);
                                        } ?> [...]</p>
                                    <div>
                                        <a target="_blank" href='{{url("post/$post->title_url")}}' class="btn btn-default">Read more...</a>
                                        <?php if (!empty($post->demoUrl)) { ?>
                                        <a target="_blank" href="<?php echo $post->demoUrl; ?>"
                                            class="btn btn-default">See Demo</a>
                                        <?php } ?>
                                        <ul class="shareListing">
                                            <li><a target="_blank"
                                                    href="https://www.facebook.com/sharer.php?u=http://jswebsolutions.in/blogPost/<?php echo $post->title; ?>"><i
                                                        class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                            <li><a href="https://plus.google.com/share?url=http://jswebsolutions.in/blogPost/<?php echo $post->title; ?>"
                                                    target="_blank"><i class="fa fa-google-plus-square"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                        <!--In feed ads-->
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <ins class="adsbygoogle" style="display:block" data-ad-format="fluid"
                            data-ad-layout-key="-fb+5w+4e-db+86" data-ad-client="ca-pub-4152597108794624"
                            data-ad-slot="8942859090"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});

                        </script>
                        <!--In feed ads-->
                        {{ $posts->links() }}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel-body">
                        @include('front.component.tags')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
