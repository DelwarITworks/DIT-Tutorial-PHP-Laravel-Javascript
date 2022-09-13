 @php 
   $tutorials =  App\Models\Admin\tutorial::where('status',1)->latest()->get();
 @endphp
 <!--Sidebar-->
    <aside id="sidebar">
      
        <!--Toggle Button-->
        <div class="button-container clearfix"><div class="menu-toggle flaticon-menu10"></div></div>
        
        <!--Menu Box-->
        <div class="menu-box">
          <!--Logo-->
      <br>
          <div class="logo text-right"><a href="{{ route('/') }}"><img src="{{ asset('public/frontend/assets/images/abc.jpg') }}"></a></div>
            
            <!--Sticky Menu-->
            <nav class="sticky-menu">
              <ul>
            @foreach($tutorials as $tutorial)
                  <li class=""><a href="{{ route('single.tutorial',$tutorial->slug) }}">{{ Str::words($tutorial->title,'3','..') }} <span class="fa fa-arrow-right"></span></a></li>
                  @endforeach
                </ul>
            
            </nav>
            
        </div>
        
        <div class="copyright">Copyright &copy; <a href="http://auburnforest.com">AuburnForest</a> 2020</div>
    </aside>