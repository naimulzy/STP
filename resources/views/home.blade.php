@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
            {{-- Left category options --}}
            <div class="col-md-2">
                    <div class="card">
                        <div class="card-header bg-secondary text-light">Select Category</div>
        
                        <div class="card-body">
                            <div class="ul">
                                <div class="li ">
                                        <a style="{{($curr=="all") ? 'font-weight:bold; font-size:1.2em' : '' }}" href={{route('home')}}>All</a></span>
                                        <span class="float-right">({{$count_all}})</span>
                                </div>
                                <hr>
                                @foreach ($categories as $cat)
                                    @if($cat->category=='Others')
                                    @php
                                        $othersCount=$cat->product_count
                                    @endphp
                                    @continue
                                    @endif
                                    <div class="li">
                                            <a style="{{($curr==$cat->category) ? 'font-weight:bold; font-size:1.2em' : '' }}"  href={{route('home.category',$cat->category)}}>{{$cat->category}}</a></span>
                                            <span class="float-right">({{$cat->product_count}})</span>
                                    </div>
                                    <hr>
                                @endforeach
                                <div class="li">
                                        <a style="{{($curr=="Others") ? 'font-weight:bold; font-size:1.2em' : '' }}" href={{route('home.category',"Others")}} >Others</a></span>
                                        <span class="float-right">({{$othersCount}})</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


        {{-- Show ads here --}}
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">
                    <button type="button" class="btn btn-outline-secondary" disabled>{{$curr}}</button>
                 </div>

                <div class="card-body bg-light">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('bad_status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('bad_status') }}
                        </div>
                    @endif
                   @if (session('current_page'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('current_page') }}
                        </div>
                    @endif

                    <div class="container">
                        <div class="row">
                            @foreach($ads as $ad) 
                            {{-- foreach adddddddddddddddddddddddddd --}}
                                <div class="col-md-6">
                                    <a href="{{ route('ads.show', $ad->id) }}">

                                        <div class="custom_card card mb-4">
                                            <img src="{{ $ad->image }}" class="card-img-top pt-2 pl-2 pr-2" style="height:200px; object-fit:contain" alt="{{ $ad->name }}">

                                            <div class="card-body">
                                                <p class="card-title" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-weight:bold">{{ $ad->name }}</p>
                                                <span>
                                                    <p class="d-inline ">Category : </p>
                                                    <strong class="d-inline " > {{$ad->category}}</strong>
                                                </span>
                                                <br>
                                                <span >
                                                    <p class="d-inline "> Condition : </p> 
                                                    <strong class="d-inline " @if($ad->condition=='New')style="color:tomato" @endif > {{$ad->condition}}</strong>
                                                </span>
                                                <br>
                                                <span>
                                                    <p class="d-inline" style="color:seagreen">Price : </p> 
                                                    <strong class="d-inline" style="color:seagreen"> {{ $ad->price }} TK</strong>
                                                    
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        {{-- Paginationnnnnnnnnnn --}}
                        <div style="">
                            {!! $ads->links() !!}
                        </div>
                                
                    </div>
                </div>
            </div>
        </div>
        {{-- Right side --}}
        <div class="col-md-2">
            <div class="card ">
                <div class="card-header">    Order by: Recent </div>
            </div>
        </div>
    </div>
</div>
@endsection
