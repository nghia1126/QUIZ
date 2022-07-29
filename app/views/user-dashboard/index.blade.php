@extends('layout.user-dashboard')
@section('content')
{{-- @php var_dump($_SESSION['auth']); @endphp --}}

<style>
    .banner {
        position: relative;
    }
    .banner-text {
        position: absolute;
        top: 30%;
        left: 30%;
        color: #000;
        font-size: 50px;
    }
</style>
<div class="banner mt-5 mb-5">
    <img src="<?= PUBLIC_URL . 'dist/img/banner.jpg'?>" alt="" width="100%">
</div>
    <div class="banner-text">Chào mừng đến với website học tập</div>
        <div class="row">
            @foreach($subjects as $subject)
            <div class="col-3 mt-3" >
                <div class="card" style="width: 100%; height: 100%">
                    <img src="{{$subject->img}}" class="card-img-top" alt="..." width="70%">
                    <div class="card-body">
                        <h5 class="card-title">{{$subject->name}}</h5>
                        <p class="card-text">
                            Số quizs: {{$count_quiz->where('subject_id', $subject->id)->count()}}
                        </p>
                        @if (isset($_SESSION['auth']))
                            <a href="<?= BASE_URL . 'subject/quiz?subject_id=' . $subject->id?>" class="btn btn-primary">Luyện tập</a>
                        @else
                            <a href="<?= BASE_URL . 'login' . $subject->id?>" class="btn btn-primary">Luyện tập</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection