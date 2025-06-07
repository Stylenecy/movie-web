@extends('layouts.main')
@section('title', 'Home')
@section('content')
    <div class="container-field pt-2">
        <div class="jumbotron">
            <h1 class="display-4">你好, {{ Auth::user()->nama }}</h1>
            <p class="lead">这是一个简单的英雄单元，一个简单的巨型电子屏风格的组件，用于吸引人们对特色内容或信息的额外关注</p>
            <hr class="my-4">
            <p>它使用排版和间距实用程序类来在更大的容器内分隔内容</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">了解更多</a>
        </div>
    </div>
@endsection
