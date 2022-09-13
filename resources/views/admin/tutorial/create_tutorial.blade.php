@extends('admin.layouts.app')

@section('content')
   <!-- Page Body Start-->
 <div class="page-wrapper">
   <div class="page-content">
       <!--breadcrumb-->
       <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
           <div class="breadcrumb-title pe-3">FDT admin</div>
           <div class="ps-3">
               <nav aria-label="breadcrumb">
                   <ol class="breadcrumb mb-0 p-0">
                       <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                       </li>
                       <li class="breadcrumb-item active" aria-current="page">New tutorial create</li>
                   </ol>
               </nav>
           </div>
           <div class="ms-auto">
               <div class="btn-group">
               <div class="btn-group">
                   <!-- Button trigger modal -->
                   <a href="{{ route('index.tutorial') }}" class="btn btn-primary" ><i class="fadeIn animated bx bx-plus"></i> tutorial List </a>
               </div>
               </div>
           </div>
       </div>
       <!--end breadcrumb-->
       
           @if(session('success'))
           <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Success</h6>
                        <div class="text-white">{{ session('success') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           @endif 
           @if(session('wrong'))
         
           <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Success</h6>
                        <div class="text-white">{{ session('wrong') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           @endif
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form action="{{ route('store.tutorial') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row product-adding">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>General</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">

                                <div class="form-group mt-3">
                                    <label for="textString">Title <small class="text-danger">max 150 characters</small></label>
                                    <input id="textString" class="form-control  @error('title') is-invalid @enderror" type="text"  value="{{ old('title') }}"  name="title" maxlength="150" placeholder="Your tutorial title" required>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class=" form-group mt-3">
                                    <label for="textSlug">Slug</label>
                                    <input id="textSlug" class="form-control .unselectable-input   @error('slug') is-invalid @enderror" type="text" name="slug" value="{{ old('slug') }}" readonly required>
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Please enter unique slug</strong>
                                        </span>
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>


                                <div class="form-group">
                                    <label class="col-form-label"><span>*</span> Tutorial Category</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror"  name="category_id"  required="" value="{{ old('category_id') }}" >
                                        <option value="">--Select--</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                        
                                    </select>

                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                              <!--  -->
                            
                                <div class="form-group mt-3 row">
                                    <div class="col-md-12">
                                        
                                    <label for="validationCustom02" class="col-form-label"><span>*</span> tutorial Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" id="validationCustom02" type="file"  required="" name="image" onchange="photoChange(this)">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>

                                    <div class="col-md-6">
                                    <img src=""  class="img-thumbnail mt-2" width="100%" value="{{ old('image') }}" id="photo">
                                    </div>
                                </div>


                      
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Meta Data</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0"> Meta Tags</label>
                                    <input class="form-control" id="validationCustom05" type="text" value="{{ old('meta_tag') }}" name="meta_tag">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Meta Description</label>
                                    <textarea rows="4" cols="12" class="form-control" name="meta_description">{{ old('meta_description') }}</textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><span class="text-danger">*</span>Add Description</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                
                                <div class="form-group">

                                    <textarea id="description" name="description">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                

                            <div class="form-group mt-3">
                                <div class="product-buttons text-center">
                                    <button class="btn btn-primary">Add course</button>
                                    <button type="button" class="btn btn-light">Discard</button>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </form>
        </div>
        <!-- Container-fluid Ends-->



   </div>
</div>

<script>
function photoChange(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#photo')
            .attr('src', e.target.result)
            .attr("class","img-thumbnail mt-3")
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<script>
function photoChange1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#photo1')
            .attr('src', e.target.result)
            .attr("class","img-thumbnail mt-3")
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
@section('footer_js')

<script>
    $('#name').keyup(function() {
        $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g, "-"));
    });
</script>
@endsection
