@extends('layouts.agent')

@section('content')
     <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Order Create</h4>
                  <form class="form-sample" method="post" action="{{route('agent.order.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Customer name</label>
                          <div class="col-sm-9">
                            <input type="text" name="customer_name" placeholder="Enter customer name" class="form-control" />
                            @error('customer_name')
                              <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"> Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="name" placeholder="Enter Product or Service name" class="form-control" />
                            @error('name')
                              <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Image</label>
                          <div class="col-sm-9">
                            <input type="file" name="image"  class="form-control" accept="image/*" />
                            @error('image')
                              <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"> Company </label>
                          <div class="col-sm-9">
                            <select name="company_id" onchange="getProducts(this)" class="form-control" multiple>
                              <option selected value="" disabled>Select company(s)</option>
                              @foreach($companies as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endforeach
                            </select>
                            @error('company_id')
                              <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Products</label>
                          <div class="col-sm-9">
                            <select name="products[]" class="form-control" id="products" multiple>
                              <option value="">Please select company first</option>
                            </select>
                          </div>
                        </div>
                      </div>

                    </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"> Description</label>
                          <div class="col-sm-9">
                            <textarea type="text" name="des" placeholder="Enter Description" class="form-control" rows="3"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Note</label>
                          <div class="col-sm-9">
                            <textarea type="text" name="note" placeholder="Enter Note" class="form-control" rows="3"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <script>
          let products = document.getElementById('products')
          function getProducts(element) {
            let arr = []
            for (let i = 0; i < element.options.length; i++) {
              if(element.options[i].selected) arr.push(element.options[i].value)
            }
            fetch(`/agent/order/get-products/${arr}`)
              .then(response => response.json())
              .then(data => {
                let html = '<option selected value="" disabled>Select products</option>'
                for (let i = 0; i < data.length; i++) {
                  html += `<option value="${data[i].product_id}">${data[i].product_name} (${data[i].unit})</option>`
                }
                products.innerHTML = html
              })
              .catch(error => console.log(error))
          }
        </script>
@endsection