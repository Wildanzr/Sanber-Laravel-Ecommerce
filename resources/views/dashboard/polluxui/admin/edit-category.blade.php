@extends('dashboard.polluxui.partials.master')

@section('title')
    Store Categories
@endsection

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body justify-content-center">
                <h4 class="card-title">Edit Product Category</h4>
                <p class="card-description">
                    Edit Product Category here
                </p>
                <form action="/category/{{$category->id}}" method="post" class="form-inline d-flex justify-content-between">
                    @csrf
                    @method('patch')
                    <label class="sr-only" for="inlineFormInputName2">Category</label>
                    <input type="text" class="col-10 form-control mb-2" name="name" id="inlineFormInputName2"
                        placeholder="{{$category->name}}" value={{$category->name}}>
                    <button type="submit" class="btn btn-primary mb-2">Edit Category</button>

                    @if ($errors->has('category'))
                        <div class="col-12 alert alert-danger">
                            <p>{{ $errors->first('category') }}</p>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List Category</h4>
                <p class="card-description">
                    See available product category in our shop
                </p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Category Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $key => $item)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-left">{{ $item->name }}</td>
                                    <td class="d-flex justify-content-center">

                                        <form action="/category/{{$item->id}}" method="post">
                                            @csrf
                                            @method('delete')

                                            <button type="button" class="btn btn-info btn-icon-text mx-2">
                                                Edit
                                                <i class="typcn typcn-edit btn-icon-append"></i>                                                                              
                                              </button>
    
                                              <button type="button" class="btn btn-warning btn-icon-text mx-2">
                                                <i class="typcn typcn-shopping-bag btn-icon-prepend"></i>                                                    
                                                See Products
                                              </button>
    
                                            <button type="submit" class="btn btn-danger btn-icon-text mx-2">
                                                <i class="typcn typcn-trash btn-icon-prepend"></i>                                                    
                                                Delete
                                              </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">There's no category</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
