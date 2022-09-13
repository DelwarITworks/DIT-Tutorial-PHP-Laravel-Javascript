@extends('layouts.app')

@section('content') 
<div id="content-section">
      
        <!--Introduction Section-->
        <section class="section introduction" id="introduction">
          <div class="sec-title">
              <span class="icon fa fa-th"></span>
                <h2>Youe Answer</h2>
            </div>
            
            <br>
            <div class="sec-content">
              <h2 >{{ $tutorial->title }}</h2>

            </div>
            <div class="sec-content">
              {!! $tutorial->description !!}

            </div>
            
        </section>
        
        
        
    </div>

@endsection
