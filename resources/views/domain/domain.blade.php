@extends('layouts.app')
@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="form-group">
            <div class="col-lg-8 col-xs-12">
                <form method="get" action="/search">
                    <div class="input-group">
                        <input type="text" id="s" name="s" class="form-control" placeholder="搜啊搜啊 我骄傲放纵">
                        <span class="input-group-btn">
                             <input type="submit" value="搜索" id='search' class="btn btn-default" >
                           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                               <span class="caret"></span>
                               <span class="sr-only">Toggle Dropdown</span>
                           </button>
                           <ul class="dropdown-menu dropdown-menu-right">
                               @foreach($navs as $navKey=>$nav)
                                   <li style="background-color: rgb(254,254,254);font-size: 15px;">
                                       <a href="/searchprovince?s={{$nav['namecn']}}">{{$nav['namecn']}}</a>
                                   </li>
                                   @if($navKey<count($navs)-1)
                                       <li role="separator" class="divider"></li>
                                   @endif
                               @endforeach
                           </ul>
                         </span>
                    </div><!-- /input-group -->
                </form>
                <div class="container" style="margin-top: 10px">
                    <div class="row">
                        <div class="form-group">
                            @foreach($domains as $key => $domain)
                                <div class="bs-callout bs-callout-warning" >
                                    <?php echo$key+1+(isset($_GET['page'])?$_GET['page']-1:0)*100; ?><a href="{{$domain['domain']}}">
                                            {{$domain['name']}}
                                        </a>

                                    <p>{{$domain['comment']}}</p>
                                </div>

                            @endforeach
                        </div>
                        <div class="form-group" >  {!! $domains->appends(['s'=>$s])->render() !!}</div>
                    </div>
                </div>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    @endif
    @endsection








